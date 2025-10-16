
// import { useEffect, useState } from "react";
// import axios from "axios";
// import Button from "./ui/Button";
import { useState } from "react";
import CalendarDouble from "./components/calendar/CalendarDouble";
import CalendarSimpleGET from "./components/calendar/CalendarSimpleGET";
import CalendarSimplePUT from "./components/calendar/CalendarSimplePUT";
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
    const [multiCalendar, setMultiCalendar] = useState([
        {
            id: 1,
            title: "Formation Développeur Web",
            periodStart: new Date(2025, 2, 10), // 10 mars 2025
            periodEnd: new Date(2025, 4, 25),   // 25 mai 2025
        },
        {
            id: 2,
            title: "Formation Data Analyst",
            periodStart: new Date(2025, 5, 1),  // 1 juin 2025
            periodEnd: new Date(2025, 6, 15),   // 15 juillet 2025
        },
        {
            id: 3,
            title: "Formation DevOps",
            periodStart: new Date(2025, 8, 5),  // 5 septembre 2025
            periodEnd: new Date(2025, 9, 20),   // 20 octobre 2025
        },
        {
            id: 4,
            title: "CDA",
            periodStart: new Date(2026, 0, 5),  // 5 janvier 2025
            periodEnd: new Date(2026, 2, 27),   // 27 Mars 2025
        }
    ]);

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
            {/* <CalendarSimpleGET
                periodStart={new Date(2025, 9, 10)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                periodEnd={new Date(2025, 11, 25)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                // shrinkable={true}
                /> */}
            <CalendarSimplePUT
                multi={multiCalendar}
                // si page multi formations, alors envoi d'un objet style avec pour chaque formation(id formation, title formation, PeriodStart, Period End)
                // PeriodStart={new Date(2026, 0, 5)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                // PeriodEnd={new Date(2026, 2, 27)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
            />
            {/* <CalendarDouble
                periodStart={new Date(2025, 9, 10)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
                periodEnd={new Date(2025, 11, 25)} // ATTENTION EN JAVASCRIPT, IL FAUT SUCRER UN MOIS ICI
            /> */}
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
