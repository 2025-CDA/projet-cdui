import React from 'react'

export default function Button ({style, icon, color,varity, children, props }) {
      // Définition des variantes et des couleurs
  const colorClasses = {
    blue: {
      solid: "bg-blue-600 text-white hover:bg-blue-800 focus:bg-blue-700",
      outline: "bg-transparent text-blue-600 border-blue-600 hover:bg-blue-50",
    },
    // Ajoutez d'autres couleurs si besoin
  };

  // Styles par défaut
  let varityClass = colorClasses[color] && colorClasses[color][varity] ? colorClasses[color][varity] : colorClasses["blue"]["solid"];

  return (
    <div>
      <button
        type="button"
        className={`py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border  ${varity === "outline" ? "border" : ""} ${varityClass} focus:outline-none disabled:opacity-50 disabled:pointer-events-none`}
        style={style}
        {...props}
      >
        {icon && <span className="mr-2">{icon}</span>}
        {children}
      </button>
    </div>
  );
}
