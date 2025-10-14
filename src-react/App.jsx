import { useEffect, useState } from "react";
import axios from "axios";
import Button from "./ui/Button";
import CardFormation from "./ui/CardFormation"



export default function App() {

    const [showAlert, setShowAlert] = useState(true);

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
        
        <div className="container flex justify-center mx-auto">
            <div className="flex flex-col ">
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

            <CardFormation trainingTitle="Nom de la formation" nbOffer="215015" trainerName= "Jérémie" startDateInternship= "00/00/0000" endDateInternship= "00/00/0000" percentageValidationPae= "20"/>
            <CardFormation />
            <br />
            <hr />
                    
            <Button color="blue" varity="solide" >click me </Button>
            <Button color="blue" varity="outline">click me </Button>

            <br />
            <hr />
            <br />
            </div>
            
        </div>
    );
}
