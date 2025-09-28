import { useEffect, useState } from "react";

export default function App() {
    const [data, setData] = useState([]);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/") // backend Symfony
            .then((res) => res.json())
            .then((json) => setData(json));
    }, []);

    return (
        <div>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <ul>
                {data.map((item) => (
                    <li key={item.id}>{item.name}</li>
                ))}
            </ul>
        </div>
    );
}
