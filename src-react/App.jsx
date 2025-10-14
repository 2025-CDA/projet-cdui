import { useEffect, useState } from "react";
import axios from "axios";
import Button from "./ui/Button";
import Label from "./ui/Label";

export default function App() {
    const [data, setData] = useState([]);

    useEffect(() => {

        const fetchData = async () => {
            try {
                // Await the response from the GET request
                const response = await axios.get("http://127.0.0.1:8000/");
                // Access the data directly from response.data
                setData(response.data);
            } catch (error) {
                // This single block catches both network errors and bad HTTP statuses (like 404 or 500)
                console.error("Failed to fetch data:", error);
            }
        };
        fetchData();
    }, []);

    // console.log(data[0])

    return (   
        <div>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <h1 className={"bg-primary"}>Test Array</h1>
            <h1 className={"bg-secondary"}>Test Array</h1>
            <h1 className={"bg-logo"}>Test Array</h1>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <ul>
                {
                    data.map((item) => (
                        <li style={{color:"var(--primary-text)"}} key={item.id}> {item.name} </li>   
                    ))
                }
            </ul>
            <Button/>   
            <Label
                labelFor={"input"} //textaria, select, checkbox, 
                text= {"Email"} // Le contenu du label
                weight= {"black"} // light, normal, medium etc.
                color= {"secondary-text"} //secondary-text ou primary-tex
                size={"base"} //sm, base, xl, 2xl etc.
            />      
        </div>
    );
}
