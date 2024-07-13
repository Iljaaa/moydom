import React from 'react';
import {Provider} from "react-redux";
import store from "./store/store";
import {createBrowserRouter, RouterProvider} from "react-router-dom";
import {LoginPage} from "../pages/LoginPage";
import {RegistryPage} from "../pages/RegistryPage";
import WithAuth from "../features/auth/components/WithAuth";
import withNavigate from "../features/auth/components/WithNavigate";

const login = withNavigate(LoginPage)
const registry = WithAuth(RegistryPage)

let router = createBrowserRouter([
  {
    path: "/",
    Component: login,
  },
  {
    path: "/registry",
    Component: registry,
  },
]);

function App() {
  return <Provider store={store} >
    <RouterProvider router={router} fallbackElement={<p>Loading...</p>} />
  </Provider>
}

export default App;
