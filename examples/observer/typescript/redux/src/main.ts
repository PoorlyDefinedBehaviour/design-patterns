type Reducer<T> = (state: T, event: DispatchEvent<T>) => T;
type Middleware<T> = (state: T, event: DispatchEvent<T>) => void;

interface DispatchEvent<T> {
  type: string;
  data: T;
}

interface Observer<T> {
  notify: (data: T) => void;
}

interface Observable<T> {
  subscribe: (observer: Observer<T>) => void;
  unsubscribe: (observer: Observer<T>) => void;
  notify: () => void;
}

class Redux<T> implements Observable<T> {
  private reducers: Reducer<T>[] = [];
  private middlewares: Middleware<T>[] = [];
  private observers: Observer<T>[] = [];
  private state: T;

  public static create_store<T>(
    initial_state: T,
    reducers: Reducer<T>[]
  ): Redux<T> {
    const redux = new Redux<T>();
    redux.state = initial_state;
    redux.reducers = reducers;
    return redux;
  }

  public get_state = (): T => Object.freeze(this.state);

  public apply_middleware(middleware: Middleware<T>): Redux<T> {
    this.middlewares.push(middleware);
    return this;
  }

  public subscribe(observer: Observer<T>): void {
    this.observers.push(observer);
  }

  public unsubscribe(observer: Observer<T>): void {
    this.observers = this.observers.filter(
      (ob: Observer<T>) => ob !== observer
    );
  }

  public notify(): void {
    this.observers.forEach((observer: Observer<T>) =>
      observer.notify(this.get_state())
    );
  }

  public dispatch(event: DispatchEvent<T>): Redux<T> {
    this.middlewares.forEach((middleware: Middleware<T>) =>
      middleware(this.get_state(), event)
    );

    this.state = this.reducers.reduce(
      (state: T, reducer: Reducer<T>) => reducer(state, event),
      this.get_state()
    );

    this.notify();
    return this;
  }
}

function reducer(state: string, event: DispatchEvent<string>): string {
  interface ReducerMap<T> {
    [key: string]: Reducer<T>;
  }

  const handlers: ReducerMap<string> = {
    SET_PHRASE: (_: string, event: DispatchEvent<string>) => event.data
  };

  const handler = handlers[event.type];
  return handler ? handler(state, event) : state;
}

function middleware(_: string, event: DispatchEvent<string>): void {
  console.log(`Event dispatched => ${event.type}:${event.data}`);
}

function main(): void {
  const store = Redux.create_store<string>("", [reducer]);
  store.apply_middleware(middleware);

  store.dispatch({ type: "SET_PHRASE", data: "hello world!" });

  console.log(`store.get_state() => ${store.get_state()}`);
}
main();
