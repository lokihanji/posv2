// import React from 'react';
// import PropTypes from 'prop-types';

// const Modal = ({
//   isOpen,
//   onClose,
//   title,
//   children,
//   onSave,
//   showSaveButton = true,
//   saveButtonText = 'Save changes',
//   closeButtonText = 'Close',
//   size = 'default', // possible values: 'sm', 'default', 'lg', 'xl'
// }) => {
//   if (!isOpen) return null;

//   const modalSizeClass = {
//     sm: 'modal-sm',
//     default: '',
//     lg: 'modal-lg',
//     xl: 'modal-xl',
//   }[size];

//   return (
//     <>
//       <div 
//         className="modal fade show" 
//         style={{ display: 'block' }}
//         id="modal" 
//         tabIndex="-1" 
//         role="dialog" 
//         aria-labelledby="modalLabel" 
//         aria-hidden="true"
//       >
//         <div className={`modal-dialog modal-dialog-centered ${modalSizeClass}`} role="document">
//           <div className="modal-content">
//             <div className="modal-header">
//               <h5 className="modal-title" id="modalLabel">{title}</h5>
//               <button 
//                 type="button" 
//                 className="btn-close" 
//                 aria-label="Close"
//                 onClick={onClose}
//               >
//                 <span aria-hidden="true">&times;</span>
//               </button>
//             </div>
//             <div className="modal-body">
//               {children}
//             </div>
//             <div className="modal-footer">
//               <button 
//                 type="button" 
//                 className="btn bg-gradient-secondary" 
//                 onClick={onClose}
//               >
//                 {closeButtonText}
//               </button>
//               {showSaveButton && (
//                 <button 
//                   type="button" 
//                   className="btn bg-gradient-primary"
//                   onClick={onSave}
//                 >
//                   {saveButtonText}
//                 </button>
//               )}
//             </div>
//           </div>
//         </div>
//       </div>
//       <div className="modal-backdrop fade show"></div>
//     </>
//   );
// };

// Modal.propTypes = {
//   isOpen: PropTypes.bool.isRequired,
//   onClose: PropTypes.func.isRequired,
//   title: PropTypes.string.isRequired,
//   children: PropTypes.node.isRequired,
//   onSave: PropTypes.func,
//   showSaveButton: PropTypes.bool,
//   saveButtonText: PropTypes.string,
//   closeButtonText: PropTypes.string,
//   size: PropTypes.oneOf(['sm', 'default', 'lg', 'xl']),
// };

// export default Modal;
