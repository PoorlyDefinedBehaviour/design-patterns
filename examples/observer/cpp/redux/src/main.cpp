#include <iostream>
#include <string>
#include <memory>
#include <vector>
#include <algorithm>
#include <map>
#include <functional>

template <typename... Ts>
auto println(Ts const &... args) -> void { (std::cout << ... << args) << '\n'; }

template <typename T>
struct DispatchEvent
{
  char const *const type;
  T const data;

  DispatchEvent(char const *const type, T const &data)
      : type(type), data(data) {}
};

template <typename T>
class Observer
{
public:
  virtual ~Observer() = default;
  virtual auto notify(T const &data) -> void = 0;
};

template <typename T>
class Observable
{
public:
  virtual ~Observable() = default;
  virtual auto subscribe(std::shared_ptr<Observer<T>> const &observer) -> void = 0;
  virtual auto unsubscribe(std::shared_ptr<Observer<T>> const &observer) -> void = 0;
  virtual auto notify(T const &data) -> void = 0;
};

template <typename T>
class Reducer
{
public:
  virtual ~Reducer() = default;
  virtual auto apply(T const &state, DispatchEvent<T> const &event) -> T = 0;
};

template <typename T>
class Redux : public Observable<T>
{
private:
  T state;
  std::vector<std::shared_ptr<Reducer<T>>> const reducers;
  std::vector<std::shared_ptr<Observer<T>>> observers;

public:
  Redux(T const &initial_state,
        std::vector<std::shared_ptr<Reducer<T>>> const &reducers)
      : state(initial_state), reducers(reducers) {}

  auto subscribe(std::shared_ptr<Observer<T>> const &observer) -> void override
  {
    observers.emplace_back(observer);
  }

  auto unsubscribe(std::shared_ptr<Observer<T>> const &observer) -> void override
  {
    observers.erase(
        std::remove_if(
            observers.begin(),
            observers.end(),
            [&](auto const &obs) {
              return obs == observer;
            }),
        observers.end());
  }

  auto notify(T const &data) -> void override
  {
    for (auto const &observer : observers)
      observer->notify(data);
  }

  auto dispatch(DispatchEvent<T> const &event) -> Redux<T> &
  {
    for (auto const &reducer : reducers)
      state = reducer->apply(state, event);

    notify(state);
    return *this;
  }
};

template <typename T>
using StateTransformer = std::function<T(T const &, DispatchEvent<T> const &)>;

class MyReducer : public Reducer<std::string>
{
private:
  std::map<char const *const, StateTransformer<std::string>> reducer_map;

public:
  MyReducer()
  {
    reducer_map.emplace("SET_PHRASE", []([[maybe_unused]] auto const &_, auto const &event) {
      return event.data;
    });
  }

  auto apply(std::string const &state, DispatchEvent<std::string> const &event) -> std::string override
  {
    if (reducer_map[event.type])
      return reducer_map[event.type](state, event);

    return state;
  }
};

class MyObserver : public Observer<std::string>
{
public:
  auto notify(std::string const &data) -> void override
  {
    println("New store state => ", data);
  }
};

auto main() -> int
{
  using namespace std::string_literals;

  std::vector<std::shared_ptr<Reducer<std::string>>> const reducers{std::make_shared<MyReducer>()};

  Redux<std::string> store(""s, reducers);

  store.subscribe(std::make_shared<MyObserver>());

  store
      .dispatch(DispatchEvent<std::string>("SET_PHRASE", "hello world!"))
      .dispatch(DispatchEvent<std::string>("SET_PHRASE", "hello world! 2"))
      .dispatch(DispatchEvent<std::string>("SET_PHRASE", "hello world! 3"));
}