document.addEventListener('DOMContentLoaded', () => {
    // Inject Modal HTML
    const modalHTML = `
    <div id="image-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 9999; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;">
        <span id="close-modal" style="position: absolute; top: 20px; right: 30px; color: white; font-size: 40px; font-weight: bold; cursor: pointer; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">&times;</span>
        <img id="modal-image" src="" style="max-width: 90vw; max-height: 90vh; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.8); transform: scale(0.8); transition: transform 0.3s ease; object-fit: contain;">
    </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    const modal = document.getElementById('image-modal');
    const modalImg = document.getElementById('modal-image');
    const closeBtn = document.getElementById('close-modal');

    // Close modal function
    const closeModal = () => {
        modal.style.opacity = '0';
        modalImg.style.transform = 'scale(0.8)';
        setTimeout(() => { modal.style.display = 'none'; }, 300);
    };

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });

    // Event delegation for clicks on images
    document.body.addEventListener('click', (e) => {
        // Check if clicked element is a product image inside a product card or category card
        if (e.target.tagName === 'IMG' && (e.target.closest('.product-card') || e.target.closest('.category-card'))) {
            // Prevent default action if needed (though img usually doesn't have one unless inside A tag)
            e.preventDefault();
            
            modalImg.src = e.target.src;
            modal.style.display = 'flex';
            
            // Trigger reflow for transition
            setTimeout(() => {
                modal.style.opacity = '1';
                modalImg.style.transform = 'scale(1)';
            }, 10);
        }
    });
});
