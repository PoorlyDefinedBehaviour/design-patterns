interface Subscriber<T> {
  notify: (data: T, unsubscribe?: Function) => void;
}

interface Subscribable<T> {
  subscribe: (subscriber: Subscriber<T>) => Subscribable<T>;
}

interface Unsubscribable<T> {
  unsubscribe: (subscriber: Subscriber<T>) => Subscribable<T>;
}

abstract class Publisher<T> implements Subscribable<T>, Unsubscribable<T> {
  protected subscribers: Subscriber<T>[] = [];

  protected notify(data: T): void {
    this.subscribers.forEach((sub: Subscriber<T>) =>
      sub.notify(data, (subscriber: Subscriber<T>) =>
        this.unsubscribe(subscriber)
      )
    );
  }

  public subscribe(subscriber: Subscriber<T>): Publisher<T> {
    this.subscribers.push(subscriber);
    return this;
  }

  public unsubscribe(subscriber: Subscriber<T>): Publisher<T> {
    this.subscribers = this.subscribers.filter(
      (sub: Subscriber<T>) => sub !== subscriber
    );
    return this;
  }
}

class AsynchonousOperation extends Publisher<string> {
  public async run(): Promise<void> {
    let count: number = 0;
    setInterval(() => this.notify(`hello world! => ${count++}`), 2000);
  }
}

class AsynchronousOperationSubscriber implements Subscriber<string> {
  public notify(data: string, unsubscribe?: Function): void {
    console.log(`Subscriber<string> notified => ${data}`);
    if (data.includes("10")) {
      console.log("unsubbing");
      unsubscribe!(this);
    }
  }
}

function main(): void {
  const operation = new AsynchonousOperation();
  operation.run();

  const subscriber = new AsynchronousOperationSubscriber();
  setTimeout(() => {
    operation.subscribe(subscriber);
  }, 5000);
}
main();
