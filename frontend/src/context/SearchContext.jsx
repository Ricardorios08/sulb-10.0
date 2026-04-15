import React, { createContext, useState, useContext } from 'react';

const SearchContext = createContext();

export const SearchProvider = ({ children }) => {
  const [pacienteSearch, setPacienteSearch] = useState('');
  const [practicaSearch, setPracticaSearch] = useState('');
  
  // Default to today's date
  const getToday = () => {
    const now = new Date();
    const y = now.getFullYear();
    const m = String(now.getMonth() + 1).padStart(2, '0');
    const d = String(now.getDate()).padStart(2, '0');
    return `${y}-${m}-${d}`;
  };

  const [startDate, setStartDate] = useState(getToday());
  const [endDate, setEndDate] = useState(getToday());

  return (
    <SearchContext.Provider value={{ 
      pacienteSearch, setPacienteSearch, 
      practicaSearch, setPracticaSearch,
      startDate, setStartDate,
      endDate, setEndDate
    }}>
      {children}
    </SearchContext.Provider>
  );
};

export const useSearch = () => useContext(SearchContext);
