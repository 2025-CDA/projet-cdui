import React from 'react'


const Alert = ({
  message ,
  title ,
  type , // "error", "success", "warning", "info"
  show = true,
  onClose
}) => {

  if (!show) return null;

  // Style adapté selon le type d'alerte (exemple simple, CSS/Tailwind)
  const typeClasses = {
    error: "bg-red-50 border-s-4 border-red-500 p-4 dark:bg-red-800/30",
    success: "bg-teal-50 border-t-4 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30 ",
    warning: "bg-yellow-50 border-yellow-500 text-yellow-800 dark:bg-yellow-800/30",
    info: "bg-blue-50 border-blue-500 text-blue-800 dark:bg-blue-800/30"
  };

  return (
    <div className={`space-y-5`}>
      <div
        className={`${typeClasses[type]}  p-4`} 
        role="alert" 
        tabIndex={-1}
        aria-labelledby="alert-title"
      >
        <div className="flex">
          <div className="shrink-0">
            <span className="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
              {/* Ajoute tes icônes personnalisées ici */}
            </span>
          </div>
          <div className="ms-3">
            <h3 id="alert-title" className="text-gray-800 font-semibold dark:text-white">
              {title}
            </h3>
            <p className="text-sm text-gray-700 dark:text-neutral-400">
              {message}
            </p>
          </div>
          {onClose &&
            <button
            onClick={onClose}
            className="absolute top-2 right-2 text-lg font-bold text-gray-600 hover:text-gray-900"
            aria-label="Fermer"
            >
                x
          </button>
          }
        </div>
      </div>
    </div>
  );
};

export default Alert;
