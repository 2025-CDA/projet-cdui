
// import { useEffect, useState } from "react";
// import axios from "axios";
// import Button from "./ui/Button";
import CalendarSimple from "./components/calendar/CalendarSimple";
import CalendarDouble from "./components/calendar/CalendarDouble";
// import Label from "./ui/Label";
// import Alert from "./ui/Alerts";
// import Select from "./ui/Select";
// import Checkbox from "./ui/Checkbox";
// import Textarea from "./ui/TextArea";
// import Avatar from "./ui/Avatar";
// import Badge from "./ui/Badge";
// import Notification from "./ui/Notification";
// import CardFormation from "./ui/CardFormation"

export default function App() {
    // const [showAlert, setShowAlert] = useState(true);


    // useEffect(() => {

    //     const fetchData = async () => {
    //         try {
    //             // Await the response from the GET request
    //             const response = await axios.get("http://127.0.0.1:8000/");
    //             // Access the data directly from response.data
    //             setData(response.data);
    //         } catch (error) {
    //             // This single block catches both network errors and bad HTTP statuses (like 404 or 500)
    //             console.error("Failed to fetch data:", error);
    //         }
    //     };
    //     fetchData();
    // }, []);

    // console.log(data[0])

    return (
        <div>
            <CalendarSimple
                periodStart={new Date(2025, 9, 10)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                periodEnd={new Date(2025, 11, 25)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                shrinkable={true}
                />
            <CalendarDouble
                periodStart={new Date(2025, 9, 10)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                periodEnd={new Date(2025, 11, 25)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
            />
            {/* <h1 className={"bg-amber-500"}>Test Array</h1>
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
            /> */}
        </div>
    );
}
