import React from 'react'

export default function Button ({style, icon, color,varity, children}) {
  return (
    <div>
        <button type="button" 
                className="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-800 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            {children}
        </button>  

    </div>
  )
}