// router.js
import { createBrowserRouter } from 'react-router-dom';
import RootLayout from '../layouts/RootLayout';
import ProtectedLayout from '../layouts/ProtectedLayout'; // Layout de protección para rutas privadas
import { Home, BuyCar, CarDetails, Chat, Chats, Login, Register, SubmitCar, ErrorPage, CarFavorites, Profile, SeeCars, About, Users, Chat_list, Banned } from '../views/indexViews';
import { ROUTES } from './paths';

export const router = createBrowserRouter([
  {
    element: <RootLayout />,
    errorElement: <ErrorPage />,
    children: [
      // Rutas públicas
      {
        path: ROUTES.HOME, // "/"
        element: <Home />,
      },
      {
        path: ROUTES.ABOUT, // "/about"
        element: <About />,
      },
      {
        path: ROUTES.LOGIN, // "/login"
        element: <Login />,
      },
      {
        path: ROUTES.REGISTER, // "/register"
        element: <Register />,
      },
      {
        path: ROUTES.CAR_DETAILS, // "/car_details"
        element: <CarDetails />,
      },
    ],
  },

  // Layout para rutas privadas (protegidas)
  {
    element: <ProtectedLayout />,
    children: [
      {
        path: ROUTES.PROFILE, // "/profile"
        element: <Profile />,
      },
      {
        path: ROUTES.SUBMIT_CAR, // "/submit_car"
        element: <SubmitCar />,
      },
      {
        path: ROUTES.CAR_FAVORITES, // "/car_favorites"
        element: <CarFavorites />,
      },
      {
        path: ROUTES.BUY_CAR, // "/buy_car"
        element: <BuyCar />,
      },
      {
        path: ROUTES.SEE_CARS, // "/see_cars"
        element: <SeeCars />,
      },
      {
        path: ROUTES.USERS, // "/users"
        element: <Users />,
      },
      {
        path: ROUTES.CHATS_LIST, // "/chats_list"
        element: <Chat_list />,
      },
      {
        path: ROUTES.CHATS, // "/chats"
        element: <Chats />,
      },
      {
        path: ROUTES.CHAT, // "/chat"
        element: <Chat />,
      },
      {
        path: ROUTES.BANNED, // "/banned"
        element: <Banned />,
      },
    ],
  },
]);
