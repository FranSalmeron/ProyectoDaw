import { createBrowserRouter } from "react-router-dom";
import RootLayout from "../layouts/RootLayout";
import { Home, BuyCar, CarDetails, Chat, Chats, Login, Register, SubmitCar, ErrorPage, CarList } from "../views/indexViews";
import { ROUTES } from "./paths";

export const router = createBrowserRouter([
  {
    element: <RootLayout />,
    errorElement: <ErrorPage />,
    children: [
      {
        path: ROUTES.HOME, // "/"
        element: <Home />,
      },
      {
        path: ROUTES.CHAT, //"/chat"
        element: <Chat />,
      },
      {
        path: ROUTES.CHATS, //"/chats"
        element: <Chats />,
      },
      {
        path: ROUTES.LOGIN, //"/login"
        element: <Login />,
      },
      {
        path: ROUTES.REGISTER, //"/register"
        element: <Register />,
      },
      {
        path: ROUTES.SUBMIT_CAR, //"/submit_car"
        element: <SubmitCar />,
      },
      {
        path: ROUTES.CAR_DETAILS, //"/car_details"
        element: <CarDetails />,
      },
      {
        path: ROUTES.BUY_CAR, //"/buy_car"
        element: <BuyCar />,
      },
      {
        path: ROUTES.BUY_CAR, //"/buy_car"
        element: <BuyCar />,
      },{
        path: ROUTES.CAR_LIST, //"/car_list"
        element: <CarList />,
      },
    ],
  },
]);
