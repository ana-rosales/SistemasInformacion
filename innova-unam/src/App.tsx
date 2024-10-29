import { createBrowserRouter, RouterProvider } from "react-router-dom";
import Home from "./views/Home";
import Panel from "./views/Panel";

const browserRouter = createBrowserRouter([
  { path: "/", element: <Home /> },
  { path: "/panel", element: <Panel />}
]);

function App() {
  return <RouterProvider router={ browserRouter } />
}

export default App
