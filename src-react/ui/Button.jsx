export default function Button (
  {variant, icon, color='blue', children, onClick, shape='standard',className, ...props}) {
      // Définition des variantes et des couleurs
  const colorVariants = {
    blue: {
      solid: "bg-blue-600 text-white hover:bg-blue-700",
      outline: "border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white",
    },
    red: {
      solid: "bg-red-600 text-white hover:bg-red-700",
      outline: "border border-red-600 text-red-600 hover:bg-red-600 hover:text-white",
    },
    green: {
      solid: "bg-green-600 text-white hover:bg-green-700",
      outline: "border border-green-600 text-green-600 hover:bg-green-600 hover:text-white",
    },
    white: {
      solid: "bg-background text-primary-text hover:bg-primary",
      outline: "border border-black-600 text-primary-text hover:bg-primary",
    }
  } 

  const shapes = {
    standard: "rounded-lg",     // bouton standard
    rounded: "rounded-xl", // arrondi (login / register)
    square: "rounded-none",    // angles droits
    circle: "rounded-full p-2",// pour icônes
  }
  const baseButton = "inline-flex items-center justify-center gap-2 font-medium rounded-lg transition duration-200 focus:outline-none w-full";

   const colorVariantClass =
    colorVariants[color] && colorVariants[color][variant]
      ? colorVariants[color][variant]
      : ""; 

  const shapeClass = shapes[shape] || "";

  return (
    <div>
      <button
        type="button"
         className={`
        ${baseButton}
        ${colorVariantClass} ${shapeClass}
        ${className}
      `}
      {...props}
      onClick={onClick}
    >
        {icon && <span className="mr-2">{icon}</span>}
        {children}
        
      </button>
    </div>
  );
}



