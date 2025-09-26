import {UserContext, ColorContext} from "./MyContext.jsx";
import {useContext} from "react";

export const ContentData = () => {

    const user = useContext(UserContext);
    const color = useContext(ColorContext);


    return (
        <>
            {/*<UserContext.Consumer>*/}
            {/*    {*/}
            {/*        (user) => {*/}
            {/*            return (*/}
            {/*                <div>*/}
            {/*                    <ul>*/}
            {/*                        <li>Name: {user.name}</li>*/}
            {/*                        <li>Age: {user.age}</li>*/}
            {/*                    </ul>*/}
            {/*                </div>*/}
            {/*            )*/}
            {/*        }*/}
            {/*    }*/}
            {/*</UserContext.Consumer>*/}
            {/*    PRE HOOK VERSION */}

            <div 
                className={`bg-[${color}]`}
            >
                <ul>
                    <li>Name: {user.name}</li>
                    <li>Age: {user.age}</li>
                    <li>Color: {color}</li>
                </ul>
            </div>
        </>
    )
}
