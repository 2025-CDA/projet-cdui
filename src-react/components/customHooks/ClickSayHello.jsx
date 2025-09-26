import {useState} from "react";
import {useUpdateTitle} from "./hooks/useUpdateTitle.jsx";

export const ClickSayHello = () => {

    const [text, setText] = useState("");
    
    useUpdateTitle(text);

    return (
        <>
            <button
                className={`bg-green-500 px-2 py-2 rounded-md w-fit`}
                onClick={() => setText("Hello Amine")}
            >Click me</button>

            <p className={"m-5"}>Current text: {text}</p>
        </>
    )
}
