import {useEffect, useState} from "react";

export const FunctionCount = () => {
    
    const [count, setCount] = useState(0);
    const [name, setName] = useState("");
    
    useEffect(() => {
        console.log("Updating title via useEffect");
        document.title = `You clicked ${count} times!`;
    }, [count])


    useEffect(() => {
        console.log("Updating title via useEffect ONLY ONCE AT MOUNT");
        document.title = `You clicked ${count} times!`;
    }, [])
    
    return (
        <>
            <div>
                <h2>Function Count</h2>
                <div className={"m-3"}>Count {count}</div>
                <button
                    onClick={() => setCount(count + 1)}
                    className={"bg-gray-900 border border-gray-500 rounded-md px-3 py-2 m-3"}
                >Count + 1</button>
                <input
                    className={"bg-gray-700 border border-gray-500 rounded-md px-3 py-2"}
                    type="text"
                    value={name}
                    onChange={
                        (e) => setName(e.target.value)
                    }
                />
            </div>
        </>
    )
}
