const outBtn = document.getElementById('out_button');
const cancleBtn = document.getElementById('cancle_btn');
const modal = document.querySelector('.modal');

outBtn.addEventListener('click', () => modal.style.display = 'block');
cancleBtn.addEventListener('click', () => modal.style.display = 'none');