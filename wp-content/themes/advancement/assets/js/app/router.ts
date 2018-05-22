import { blogIndex } from './routes/blog-index';

// routes object to assign pathname to function for that route
const routes = {
    // For example  "/": () => home()
    "/blog/": () => blogIndex(),
};

export function router(path): void {

  let pathMatch = path.match(/\/(.*?)\//);
  if (pathMatch) { 
      pathMatch = pathMatch[0]; 
      routes[pathMatch]();
  } else if (path === '/') {
      routes['/']();
  } 
}
