import java.util.function.Consumer;
import java.util.function.Function;
import java.util.function.Predicate;

interface Observer<T> {
  public void next(final T value);
  public void error(final RuntimeException error);
  public void done();
}

class Observable<T> {
  private final Consumer<Observer<T>> handler;

  public Observable(final Consumer<Observer<T>> handler){
    this.handler = handler;
  }

  public Observable<T> subscribe(final Observer<T> observer) {
    this.handler.accept(observer);
    return this;
  }

  public Observable<T> subscribe(final Consumer<T> observer) {
    return this.subscribe(new Observer<T>() {
      public void next(final T value) { observer.accept(value); }
      public void error(final RuntimeException error) { /** no-op */ }
      public void done() { /** no-op */ }
    });
  }

  public Observable<T> map(final Function<T, T> mapper) {
    final var outer = this;

    return new Observable<T>(new Consumer<Observer<T>>(){
      public void accept(final Observer<T> observer){
        outer.subscribe(new Observer<T>(){
          public void next(final T value) { observer.next(mapper.apply(value)); }
          public void error(final RuntimeException error) { observer.error(error); }
          public void done() { observer.done(); }
        });
      }
    });
  }

  public Observable<T> filter(final Predicate<T> predicate) {
    final var outer = this;

    return new Observable<T>(new Consumer<Observer<T>>(){
      public void accept(final Observer<T> observer) {
        outer.subscribe(new Observer<T>() {
          public void next(final T value) {
            if(predicate.test(value)) 
              observer.next(value);
          }
          public void error(final RuntimeException error) { observer.error(error); }
          public void done() { observer.done(); }
        });
      }
    });
  }

  public static <Ts> Observable<Ts> from(final Ts ...args) {
    return new Observable<Ts>(new Consumer<Observer<Ts>>() {
      public void accept(final Observer<Ts> observer) {
        for(final Ts arg : args)
          observer.next(arg);
        observer.done();
      }
    });
  }
}

public class Main {
  public static void main(final String[] args) {
    Observable.from(1, 2, 3, 4, 5)
     .map(x -> x * 2)
     .filter(x -> x > 5)
     .subscribe(System.out::println);
  }
}