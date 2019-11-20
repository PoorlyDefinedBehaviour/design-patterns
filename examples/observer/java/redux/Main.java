import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.function.BiFunction;
import java.util.function.Function;

class DispatchEvent<T> {
  private final String type;
  private final T data;

  public DispatchEvent(final String type, final T data) {
    this.type = type;
    this.data = data;
  }

  public String get_type() {
    return this.type;
  }

  public T get_data() {
    return data;
  }
}

interface Observer<T> {
  public void on_notify(final T data);
}

interface Observable<T> {
  public void subscribe(final Observer<T> observer);
  public void unsubscribe(final Observer<T> observer);
  public void notify_all(final T data);
}

interface Reducer<T> {
  public T apply(final T state, final DispatchEvent<T> event);
}

class Redux<T> implements Observable<T> {
  private ArrayList<Reducer<T>> reducers = new ArrayList<Reducer<T>>();
  private ArrayList<Observer<T>> observers = new ArrayList<Observer<T>>();
  private T state;

  public static <ValueType> Redux<ValueType> create_store(
    final ValueType initial_state,
    final ArrayList<Reducer<ValueType>> reducers
  ){
    final var redux = new Redux<ValueType>();
    redux.state = initial_state;
    redux.reducers = reducers;
    return redux;
  }

  public void subscribe(final Observer<T> observer) {
    this.observers.add(observer);
  }

  public void unsubscribe(final Observer<T> observer) {
    this.observers.removeIf(ob -> ob.equals(observer));
  }

  public void notify_all(final T data) {
    this.observers.forEach(observer -> observer.on_notify(data));
  }

  public Redux<T> dispatch(final DispatchEvent<T> event) {
    for(final Reducer<T> reducer : this.reducers)
      this.state = reducer.apply(this.state, event);

    this.notify_all(this.state);
    return this;
  }
}

class MyReducer implements Reducer<String> {
  private final HashMap<String, BiFunction<String, DispatchEvent<String>, String>> reducer_map = 
                  new HashMap<String, BiFunction<String, DispatchEvent<String>, String>>();

  public MyReducer(){
    this.reducer_map.put("SET_PHRASE", (state, event) -> event.get_data());
  }

  public String apply(final String state, final DispatchEvent<String> event) {
    return this.reducer_map.containsKey(event.get_type())
            ? this.reducer_map.get(event.get_type()).apply(state, event)
            : state;
  }
}

class MyObserver implements Observer<String> {
  public void on_notify(final String data) {
    System.out.println(String.format("New store state => %s", data));
  }
}

public class Main {
  public static void main(final String[] args) {

    final ArrayList<Reducer<String>> reducers = new ArrayList<>(Arrays.asList(new MyReducer()));
    final Redux<String> store = Redux.create_store("", reducers);

    store.subscribe(new MyObserver());

    store
      .dispatch(new DispatchEvent<String>("SET_PHRASE", "hello world!")) 
      .dispatch(new DispatchEvent<String>("SET_PHRASE", "hello world! 2"))
      .dispatch(new DispatchEvent<String>("SET_PHRASE", "hello world! 3"));
  }
}