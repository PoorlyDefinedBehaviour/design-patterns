interface Observer {
  next: Function;
  error?: (e: Error) => void;
  done?: () => void;
}

class Observable {
  constructor(private handler: (observer: Observer) => void) {}

  public subscribe = (observer: Function | Observer) => {
    if (this.isFunction(observer)) {
      this.handler(this.toObserverObject(observer as Function));
    } else {
      this.handler(observer as Observer);
    }
  };

  private isFunction = (obj: any): boolean => obj instanceof Function;

  private toObserverObject = (observer: Function): Observer => ({
    next: observer,
    error: (e: Error) => {},
    done: () => {}
  });

  public map = <T>(mapper: (value: T) => T) =>
    new Observable((observer: Observer) =>
      this.subscribe({
        next: (value: T) => observer.next(mapper(value)),
        error: (e: Error) => observer.error!(e),
        done: () => observer.done!()
      })
    );

  public filter = <T>(predicate: (value: T) => boolean) =>
    new Observable((observer: Observer) =>
      this.subscribe({
        next: (value: T) => predicate(value) && observer.next(value),
        error: (e: Error) => observer.error!(e),
        done: () => observer.done!()
      })
    );

  private pluck_deep = <T>(obj: T, path: string) =>
    path
      .split(".")
      .reduce(
        (partialObj: Partial<T>, property: string) => partialObj[property],
        obj
      );

  public pluck = <T>(path: string) =>
    new Observable((observer: Observer) =>
      this.subscribe({
        next: (value: T) => observer.next(this.pluck_deep(value, path)),
        error: (e: Error) => observer.error!(e),
        done: () => observer.done!()
      })
    );

  public static from = <T>(promise: Promise<T>) =>
    new Observable((observer: Observer) => {
      promise
        .then((value: T) => observer.next(value))
        .catch((error: Error) => observer.error!(error))
        .finally(() => observer.done!());
    });

  public static of = <T>(args: T[]) =>
    new Observable((observer: Observer) => {
      args.forEach((value: T) => observer.next(value));
      observer.done!();
    });
}

function main(): void {
  Observable.of([
    { data: { text: "hello world!" } },
    { data: { text: "hello world!" } },
    { data: { text: "hello world 10!" } },
    { data: { text: "hello world!" } },
    { data: { text: "hello world again!" } }
  ])
    .pluck("data.text")
    .filter((value: string) => !value.includes("10"))
    .map((value: string) => value.toUpperCase())
    .subscribe(console.log);
}
main();
