import React from 'react'

export default function Button ({style, icon, color,varity, children, onClick, props}) {
      // Définition des variantes et des couleurs
  const colorClasses = {
    blue: {
      solid: "bg-primary text-white hover:bg-secondary",
      outline: "bg-transparent text-primary border-primary hover:bg-logo",
    },
    // Ajoutez d'autres couleurs si besoin
  };

  // Styles par défaut
  let varityClass = colorClasses[color] && colorClasses[color][varity] ? colorClasses[color][varity] : colorClasses["blue"]["solid"];

  return (
    <div>
      <button
        type="button"
        className={`py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border w-full  ${varity === "outline" ? "border" : ""} ${varityClass} focus:outline-none `}
        style={style}
        onClick={onClick}
        {...props}
      >
        {icon && <span className="mr-2">{icon}</span>}
        {children}
      </button>
    </div>
  );
}
