import React from 'react';
import {Provider} from "react-redux";
import {createBrowserRouter, RouterProvider} from "react-router-dom";
import {LoginPage} from "../pages/LoginPage";
import {DataPage} from "../pages/DataPage";
import WithAuth from "../features/auth/WithAuth";

import store from "./store/store";

const dataWithAuth = WithAuth(DataPage)

let router = createBrowserRouter([
  {
    path: "/",
    Component: LoginPage,
  },
  {
    path: "/data",
    Component: dataWithAuth,
  },
]);

function App() {
  return <Provider store={store} >
    <RouterProvider router={router} fallbackElement={<p>Loading...</p>} />
  </Provider>
}

export default App;
