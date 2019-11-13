interface Observer {
  notify: <EmitterType, DataType>(
    event_group: string,
    emitter: EmitterType,
    data: DataType
  ) => void;
}

class Logger implements Observer {
  public notify<EmitterType, DataType>(
    event_group: string,
    _: EmitterType,
    data: DataType
  ): void {
    console.log(`Logging => ${event_group}:${data}`);
  }
}

class Twitter implements Observer {
  public notify<EmitterType, DataType>(
    event_group: string,
    _: EmitterType,
    data: DataType
  ): void {
    console.log(`Posting to twitter => ${event_group}:${data}`);
  }
}

class EventDispatcher {
  private groups: Map<string, Observer[]> = new Map<string, Observer[]>();

  constructor() {
    this.init_event_group("*");
  }

  private init_event_group(event_group: string): void {
    if (!this.groups.has(event_group)) {
      this.groups.set(event_group, []);
    }
  }

  public attach(event_group: string, observer: Observer): EventDispatcher {
    this.init_event_group(event_group);
    this.groups.get(event_group)!.push(observer);
    return this;
  }

  public detach(event_group: string, observer: Observer): EventDispatcher {
    this.init_event_group(event_group);
    this.groups.set(
      event_group,
      this.groups.get(event_group)!.filter((ob: Observer) => ob === observer)
    );
    return this;
  }

  private is_wildcard = (event_group: string): boolean => event_group === "*";

  public emit<EmitterType, DataType>(
    event_group: string,
    emitter: EmitterType,
    data: DataType
  ): EventDispatcher {
    (this.groups.get(event_group) || []).forEach((observer: Observer) =>
      observer.notify(event_group, emitter, data)
    );

    if (!this.is_wildcard(event_group)) {
      this.groups
        .get("*")!
        .forEach((observer: Observer) =>
          observer.notify(event_group, emitter, data)
        );
    }

    return this;
  }
}

function main(): void {
  const dispatcher = new EventDispatcher();
  const logger = new Logger();
  const twitter = new Twitter();

  dispatcher
    .attach("*", logger)
    .attach("user:banned", twitter)
    .emit("*", null, "hello world")
    .emit("user:new", null, "john doe")
    .emit("user:banned", null, "john doe");
}
main();
