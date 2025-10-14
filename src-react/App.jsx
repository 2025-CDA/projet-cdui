import { useEffect, useState } from "react";
import axios from "axios";
import Button from "./ui/Button";
import  Alert from "./ui/Alerts";
import Notification from "./ui/Notification";





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

    return (
        
        <div>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <h1 className={"bg-primary"}>Test Array</h1>
            <h1 className={"bg-secondary"}>Test Array</h1>
            <h1 className={"bg-logo"}>Test Array</h1>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <h1 className={"bg-amber-500"}>Test Array</h1>
            <ul>
                {data.map((item) => (
                    <li key={item.id}>{item.name}</li>
                ))}
            </ul>

        <Button color={"blue"} varity={"solide"}>click me </Button>
        <Button color={"blue"} varity={"outline"}>click me </Button>
        <br/><br/><br/>
        <div className="flex gap-10">
            <div>
                <Alert 
                    type='error'
                    title= 'successfully and successfully '
                    message="aaaaaaaaaaa."   
                />
                <Alert 
                    type='success'
                    title= 'notification error'
                    message="aaaaaaaaaaa."   
                />
                <Alert 
                    type='warning'
                    title= 'notification error'
                    message="aaaaaaaaaaa."   
                />
                <Alert 
                    type='info'
                    title= 'notification error'
                    message="aaaaaaaaaaa."   
                />
            </div>
            <div>
                <Notification
                    type='uploadSuccess'
                    title= 'upload successfully and successfully  '
                    message="aaaaaaaaaaa." 
                />

                <Notification
                    type='error'
                    title= 'notification error'
                    message="aaaaaaaaaaa."  
                />
                <Notification
                    type='success'
                    title= 'successfully and successfully  ' 
                />
                <Notification
                    type='info'
                    title= 'successfully and successfully  '
                />

                <Notification
                    type='action'
                    title= 'successfully and successfully  '
                />
            </div>
        </div>




            




        
            
        </div>
    );
}
