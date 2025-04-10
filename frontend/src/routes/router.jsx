import { createBrowserRouter } from "react-router-dom";
import RootLayout from "../layouts/RootLayout";
import { Home, BuyCar, CarDetails, Chat, Chats, Login, Register, SubmitCar, ErrorPage, CarFavorites, Profile } from "../views/indexViews";
import { ROUTES } from "./paths";
import SeeCars from "../views/SeeCars";

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
        path: ROUTES.CAR_FAVORITES, //"/car_favorites"
        element: <CarFavorites />,
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
      },
      {
        path: ROUTES.PROFILE, //"/profile"
        element: <Profile />,
      },
      {
        path: ROUTES.SEE_CARS, //"/see_cars"
        element: <SeeCars />,
      },
    ],
  },
]);
