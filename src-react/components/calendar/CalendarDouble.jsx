
import { useState } from 'react';
import './Calendar.css';

// ----------------------
// Constantes pour labels
// ----------------------
const MONTHS_FR = [
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];
const DAYS_FR = ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"];

// --------------------------------------
// Fonctions utilitaires pour le calendrier
// --------------------------------------
function getDaysInMonth(month, year) {
    return new Date(year, month + 1, 0).getDate();
}

function getFirstDayOfWeek(month, year) {
    let day = new Date(year, month, 1).getDay();
    return (day + 6) % 7;
}

// Génère la structure des semaines pour un mois donné
function getCalendarRows(month, year) {
    const daysInMonth = getDaysInMonth(month, year);
    const firstDay = getFirstDayOfWeek(month, year);
    const daysInPrevMonth = getDaysInMonth((month - 1 + 12) % 12, month === 0 ? year - 1 : year);

    let days = [];
    // Jours du mois précédent pour compléter la première semaine
    for (let i = firstDay - 1; i >= 0; i--) {
        days.push({
        day: daysInPrevMonth - i,
        currentMonth: false,
        date: new Date(year, month - 1, daysInPrevMonth - i)
        });
    }
    // Jours du mois courant
    for (let i = 1; i <= daysInMonth; i++) {
        days.push({
        day: i,
        currentMonth: true,
        date: new Date(year, month, i)
        });
    }
    // Jours du mois suivant pour compléter la grille (6 semaines)
    let nextDay = 1;
    while (days.length < 42) {
        days.push({
            day: nextDay,
            currentMonth: false,
            date: new Date(year, month + 1, nextDay)
        });
        nextDay++;
    }
    // Découper en semaines
    let weeks = [];
    for (let i = 0; i < days.length; i += 7) {
        weeks.push(days.slice(i, i + 7));
    }
    return weeks;
}

// ---------------------------------------------------
// Composant principal : calendrier double sélection
// ---------------------------------------------------
function CalendarDouble({ periodStart = null, periodEnd = null, onPeriodChange }) {
    // --------------------------
    // State pour la sélection
    // --------------------------
    const [startDate, setStartDate] = useState(periodStart ? new Date(periodStart) : null);
    const [endDate, setEndDate] = useState(periodEnd ? new Date(periodEnd) : null);

    // --------------------------
    // State pour le mois/année affichés
    // --------------------------
    const today = new Date();
    const [month, setMonth] = useState(today.getMonth());
    const [year, setYear] = useState(today.getFullYear());

    // Liste d'années pour le select
    const years = [];
    for (let y = year - 2; y <= year + 4; y++) years.push(y);

    // --------------------------
    // Gestion de la sélection de période
    // --------------------------
    const handleSelect = (date) => {
        if (!startDate || (startDate && endDate)) {
            setStartDate(date);
            setEndDate(null);
            onPeriodChange && onPeriodChange(date, null);
        }
        else if (date < startDate) {
            setStartDate(date);
            setEndDate(null);
            onPeriodChange && onPeriodChange(date, null);
        }
        else {
            setEndDate(date);
            onPeriodChange && onPeriodChange(startDate, date);
        }
    };

    // --------------------------
    // Navigation mois précédent/suivant
    // --------------------------
    const handlePrev = () => {
        if (month === 0 ) {
            setMonth(10);
            setYear(year - 1);
        } else if (month === 1 ) {
            setMonth(11);
            setYear(year - 1);
        } else {
            setMonth(month - 2);
        }
    };

    const handleNext = () => {
        if (month === 11) {
            setMonth(1);
            setYear(year + 1);
        } else if (month === 10) {
            setMonth(0);
            setYear(year + 1);
        } else {
            setMonth(month + 2);
        }
    };

    // --------------------------
    // Vérifie si une date est dans la période sélectionnée
    // --------------------------
    const isInPeriod = (date) => {
        if (!startDate || !endDate) {
            return false;
        }
        const d = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        const s = new Date(startDate.getFullYear(), startDate.getMonth(), startDate.getDate());
        const e = new Date(endDate.getFullYear(), endDate.getMonth(), endDate.getDate());
        return d >= s && d <= e;
    };

    // --------------------------
    // Rendu d'un calendrier simple (mois donné)
    // --------------------------
    const renderCalendar = (month, year) => {
        const weeks = getCalendarRows(month, year);
        const today = new Date();
        const todayY = today.getFullYear();
        const todayM = today.getMonth();
        const todayD = today.getDate();

        return (
            <div className="p-3 bg-white ">
                <div className="flex pb-1.5">
                    {DAYS_FR.map((d) => (
                        <span key={d} className="m-px w-10 block text-center text-xs text-gray-500">
                            {d}
                        </span>
                    ))}
                </div>
                {weeks.map((week, wi) => (
                    <div key={wi} className="flex">
                        {week.map(({ day, currentMonth, date }, di) => {
                            // Détection du premier et dernier jour de la période
                            const isStart = startDate && date.getFullYear() === startDate.getFullYear() && date.getMonth() === startDate.getMonth() && date.getDate() === startDate.getDate();
                            const isEnd = endDate && date.getFullYear() === endDate.getFullYear() && date.getMonth() === endDate.getMonth() && date.getDate() === endDate.getDate();
                            const inPeriod = isInPeriod(date);

                            // Détection du premier et dernier jour de la semaine
                            const isFirstOfWeek = di === 0;
                            const isLastOfWeek = di === 6;

                            // Détection du jour courant
                            const isToday = date.getFullYear() === todayY && date.getMonth() === todayM && date.getDate() === todayD;

                            // Classes pour arrondir le fond logo
                            let logoBgClass = "absolute z-0 w-10 h-10 bg-logo";
                            // N'afficher le bg-logo que si le jour est dans la période ET dans le mois courant
                            if (inPeriod && currentMonth && !isStart && !isEnd) {
                                if (isFirstOfWeek) {
                                    logoBgClass += " rounded-l-full";
                                }
                                if (isLastOfWeek) {
                                    logoBgClass += " rounded-r-full";
                                }
                            }
                            if (isStart && currentMonth) {
                                logoBgClass += " rounded-l-full";
                            }
                            if (isEnd && currentMonth) {
                                logoBgClass += " rounded-r-full";
                            }

                            // Classes pour le bouton principal
                            let btnClass = `size-10 flex justify-center items-center border-2 border-none text-xs rounded-full z-10
                                ${currentMonth ? "text-primary-text hover:border-primary hover:border-3 hover:border-solid" : "text-secondary-text"}
                                ${currentMonth ? "" : "disabled:opacity-50 disabled:pointer-events-none"}
                                ${isStart ? "bg-primary text-white" : ""}
                                ${isEnd ? "bg-primary text-white" : ""}
                                ${isToday ? "border-3 border-primary border-solid" : ""}
                            `;
                            if (isStart && isFirstOfWeek) {
                                btnClass += " rounded-l-full";
                            }
                            if (isEnd && isLastOfWeek) {
                                btnClass += " rounded-r-full";
                            }

                            return (
                                <div key={`${wi}-${di}`} className="relative flex justify-center items-center">
                                    {inPeriod && currentMonth && (
                                        <div className={logoBgClass} />
                                    )}
                                    <button
                                        type="button"
                                        onClick={() => handleSelect(date)}
                                        className={btnClass}
                                        disabled={!currentMonth}
                                    >
                                        {day}
                                    </button>
                                </div>
                            );
                        })}
                    </div>
                ))}
            </div>
        );
    };

    // --------------------------
    // Rendu principal du composant
    // --------------------------
    return (
        <div className="space-y-4 p-3 bg-white border border-gray-200 ">
            {/* Navigation mois/année */}
            <div className="flex items-center justify-between px-2">
                <button
                    type="button"
                    className="size-8 flex justify-center items-center text-primary-text hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                    aria-label="Précédent"
                    onClick={handlePrev}>
                    <svg className="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1" strokeLinecap="round" strokeLinejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <div className="flex gap-55 font-regular text-lg">
                    <span>
                        {MONTHS_FR[month]} {year}
                    </span>
                    <span>
                        {MONTHS_FR[(month + 1) % 12]} {month === 11 ? year + 1 : year}
                    </span>
                </div>
                <button
                    type="button"
                    className="size-8 flex justify-center items-center text-primary-text hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                    aria-label="Suivant"
                    onClick={handleNext}>
                    <svg className="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1" strokeLinecap="round" strokeLinejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>

            {/* Double calendrier côte à côte */}
            <div className="flex gap-4">
                {renderCalendar(month, year)}
                {renderCalendar((month + 1) % 12, month === 11 ? year + 1 : year)}
            </div>

            {/* Affichage de la période sélectionnée */}
            {(startDate && endDate) && (
                <div className="w-full flex justify-end items-center gap-2 mt-4">
                    <span className="block text-center text-xs text-gray-700 font-medium">
                        {startDate.toLocaleDateString()} - {endDate.toLocaleDateString()}
                    </span>
                    <button
                        className="px-4 py-2 rounded-md border border-gray-300 bg-white text-xs text-gray-700 hover:bg-gray-100 transition"
                    >
                        Annuler
                    </button>
                    <button
                        className="px-4 py-2 rounded-md bg-blue-600 text-white font-semibold text-xs hover:bg-blue-700 transition"
                    >
                        Sauvegarder
                    </button>
                </div>
            )}
        </div>
    );
}

export default CalendarDouble;
