import {Navigate} from "react-router-dom";

// Définition d'un composant fonctionnel nommé PrivateRoute qui prend en paramètres :
// - isAdmin : un booléen indiquant si l'utilisateur est administrateur
// - children : les composants enfants à rendre si la condition est remplie
export const PrivateRoute = ({isAdmin, children}) => {
    // Si l'utilisateur n'est pas admin (isAdmin === false)
    if (!isAdmin) {
        return (
            <>
                // On redirige vers la page d'accueil ("/") en remplaçant l'historique,
                // ce qui évite à l'utilisateur de revenir en arrière vers la page protégée.
                <Navigate to="/" replace/>;
            </>
        )
    }
    // Si l'utilisateur est admin (isAdmin === true),
    // le composant affiche directement les enfants passés en propriété.
    return children;
}
