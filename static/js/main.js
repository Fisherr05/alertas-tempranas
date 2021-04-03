const btnDelete=document.querySelectorAll('.btn-delete')

if(btnDelte) {
    const btnA=Array.from(btnDelete);
    btnArray.forEach((btn) => {
        btn.addEventListener('click',(e) => {
            if(!confirm('¿Seguro quiere eliminar?')) {
                e.preventDefault();
            }
        });
    });
}
