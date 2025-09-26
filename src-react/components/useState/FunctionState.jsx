import {useState} from "react";


export const FunctionState = () => {

    const [counter, setCounter] = useState(0);
    const [previousCounter, setPreviousCounter] = useState(null);

    const addOne = () => {
        setCounter((prevState) => {
            return prevState + 1
        })
        setPreviousCounter(counter)
    }
    
    return (
        <>
            <div className={"m-5 flex flex-col gap-4"}>
                <h2 className={"text-3xl"}>Function State</h2>
                <p> Counter 2: {counter}</p>
                <p> Previous Counter Value 2: {previousCounter ? previousCounter : 0}</p>
                <button className={"bg-blue-950 py-4 px-6 rounded-2xl"}
                        onClick={
                            () => {
                                setCounter((prevState) => {
                                    return prevState + 1
                                })
                                setPreviousCounter(counter)
                            }}>
                    Increment Counter
                </button>
            </div>
        </>
    )
}
