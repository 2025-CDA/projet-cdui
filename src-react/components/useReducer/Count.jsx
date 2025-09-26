import {useReducer} from "react";

const reducer = (state, action) => {
    // switch(action) {
    switch(action.type) {
        case "increment":
            return state + 1
        case "decrement":
            return state - 1
        case "reinitialize":
            return 0
        default:
            return state
    }
}

export const Count = () => {

    const [countState, countDispatch] = useReducer(reducer, 0,)

    return (
        <>
            <div className={"flex flex-col justify-center items-center gap-5 m-5"}>
                <h2>{countState}</h2>
                <div className={"flex justify-center items-center gap-5"}>
                    <button
                        className={"bg-red-700 px-2 py-2 rounded-md w-fit"}
                        // onClick={() => { countDispatch("decrement")}}
                        onClick={() => { countDispatch({ type: "decrement" })}}
                    >-</button>
                    <button
                        className={"bg-green-700 px-2 py-2 rounded-md w-fit"}
                        // onClick={() => { countDispatch("increment")}}
                        onClick={() => { countDispatch({ type: "increment" })}}
                    >+</button>
                </div>
                <button
                    className={"bg-blue-700 px-2 py-2 rounded-md w-fit"}
                    // onClick={() => { countDispatch("reinitialize")}}
                    onClick={() => { countDispatch({ type: "reinitialize" })}}

                >Clear</button>
            </div>
        </>
    )
}
