interface IRequest {
  path: string;
}

interface IResponse {}

abstract class Middleware {
  protected next: Middleware;

  public set_next(next: Middleware): Middleware {
    this.next = next;
    return this;
  }

  public abstract process(request: IRequest, response: IResponse): boolean;
}

class UserExistsMiddleware extends Middleware {
  public process(request: IRequest, response: IResponse): boolean {
    // assume true
    return this.next ? this.next.process(request, response) : true;
  }
}

class IsAdminMiddleware extends Middleware {
  public process(request: IRequest, response: IResponse): boolean {
    // assume true
    return this.next ? this.next.process(request, response) : true;
  }
}

type RouteHandlerFunction = (request: IRequest, response: IResponse) => any;

class Server {
  private head_middleware: Middleware;
  private tail_middleware: Middleware;
  private route_handlers: Map<string, Function> = new Map<string, Function>();

  public use(middleware: Middleware): Server {
    if (!this.head_middleware) {
      this.head_middleware = middleware;
    } else {
      this.tail_middleware.set_next(middleware);
    }
    this.tail_middleware = middleware;

    return this;
  }

  public route(path: string, handler: RouteHandlerFunction): Server {
    this.route_handlers.set(path, handler);
    return this;
  }

  public process(request: IRequest): void {
    const response = {};

    const handler = this.route_handlers.get(request.path);
    if (!handler) {
      return;
    }

    if (!this.head_middleware) {
      handler(request, response);
      return;
    }

    if (this.head_middleware.process(request, response)) {
      handler(request, response);
    }
  }
}

function main(): void {
  const server = new Server();
  server.use(new UserExistsMiddleware()).use(new IsAdminMiddleware());

  server.route("/admin", (_: IRequest, __: IResponse) =>
    console.log("hello world!")
  );

  server.process({ path: "/admin" });
}
main();
