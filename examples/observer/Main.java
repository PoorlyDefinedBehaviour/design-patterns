import java.util.HashSet;

interface Observer<T> {
  public void notify(final T state);
}

interface Observable<T> {
  public void subscribe(final Observer<T> observer);

  public void unsubscribe(final Observer<T> observer);

  public void notify(final T state);
}

class NewsLetter implements Observable<String> {
  private final HashSet<Observer<String>> observers = new HashSet<Observer<String>>();

  public void subscribe(final Observer<String> observer) {
    this.observers.add(observer);
  }

  public void unsubscribe(final Observer<String> observer) {
    this.observers.remove(observer);
  }

  public void notify(final String state) {
    this.observers.forEach(observer -> observer.notify(state));
  }

  public NewsLetter dispatch(final String news) {
    this.notify(news);
    return this;
  }
}

class Person implements Observer<String> {
  private final String name;

  Person(final String name) {
    this.name = name;
  }

  public void notify(final String state) {
    System.out.println(String.format("%s received news => %s", this.name, state));
  }
}

public class Main {
  public static void main(final String[] args) {
    final var news = new NewsLetter();

    news.subscribe(new Person("John"));
    news.subscribe(new Person("Alice"));
    news.subscribe(new Person("Bob"));

    news
      .dispatch("Some news 1")
      .dispatch("Some news 2")
      .dispatch("Some news 3");
  }
}
