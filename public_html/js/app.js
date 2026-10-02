// ICLO Website Frontend Interactions

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggler
    const mobileToggle = document.getElementById('mobile-toggle');
    const navLinks = document.getElementById('nav-links');
    
    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });
    }

    // 2. Resources Search & Tab Filtering
    const resourceSearchInput = document.getElementById('resource-search');
    const resourceTabs = document.querySelectorAll('.resource-tab-btn');
    const resourceCards = document.querySelectorAll('.resource-card');

    if (resourceCards.length > 0) {
        let activeCategory = 'all';
        let searchQuery = '';

        const filterResources = () => {
            resourceCards.forEach(card => {
                const category = card.getAttribute('data-category');
                const title = card.querySelector('.resource-title').textContent.toLowerCase();
                const desc = card.querySelector('.resource-description').textContent.toLowerCase();
                
                const matchesCategory = (activeCategory === 'all' || category === activeCategory);
                const matchesSearch = (title.includes(searchQuery) || desc.includes(searchQuery));

                if (matchesCategory && matchesSearch) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        };

        if (resourceSearchInput) {
            resourceSearchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase();
                filterResources();
            });
        }

        resourceTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                resourceTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                activeCategory = tab.getAttribute('data-tab');
                filterResources();
            });
        });
    }

    // 3. LSP Registration Wizard
    const wizardForm = document.getElementById('lsp-wizard-form');
    const wizardSteps = document.querySelectorAll('.wizard-step-content');
    const stepIndicators = document.querySelectorAll('.wizard-step-indicator-item');
    const timelineItems = document.querySelectorAll('.lsp-timeline-item');
    const prevBtn = document.getElementById('wizard-prev-btn');
    const nextBtn = document.getElementById('wizard-next-btn');

    if (wizardForm && wizardSteps.length > 0) {
        let currentStepIndex = 0;

        const updateWizard = () => {
            // Show/Hide Content
            wizardSteps.forEach((step, index) => {
                if (index === currentStepIndex) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });

            // Update Header Indicators
            stepIndicators.forEach((ind, index) => {
                if (index === currentStepIndex) {
                    ind.classList.add('active');
                } else {
                    ind.classList.remove('active');
                }
            });

            // Update Timeline Indicators
            timelineItems.forEach((item, index) => {
                if (index <= currentStepIndex) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });

            // Toggle Navigation Buttons
            if (currentStepIndex === 0) {
                prevBtn.style.visibility = 'hidden';
            } else {
                prevBtn.style.visibility = 'visible';
            }

            const isLastStep = (currentStepIndex === wizardSteps.length - 1);
            const isIndonesian = document.documentElement.lang === 'id';
            
            if (isLastStep) {
                nextBtn.textContent = isIndonesian ? 'Kirim Pendaftaran' : 'Submit Registration';
                nextBtn.classList.remove('btn-primary');
                nextBtn.style.backgroundColor = '#0d9488'; // Teal
                nextBtn.style.color = '#ffffff';
            } else {
                nextBtn.textContent = isIndonesian ? 'Lanjut' : 'Next';
                nextBtn.style.backgroundColor = '';
                nextBtn.style.color = '';
                nextBtn.classList.add('btn-primary');
            }
        };

        const validateStep = (stepIndex) => {
            const currentStep = wizardSteps[stepIndex];
            const inputs = currentStep.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = '#ef4444'; // Red
                    isValid = false;
                } else {
                    input.style.borderColor = ''; // Reset
                }
            });

            return isValid;
        };

        nextBtn.addEventListener('click', () => {
            if (!validateStep(currentStepIndex)) {
                alert(document.documentElement.lang === 'id' 
                    ? 'Mohon lengkapi seluruh field wajib sebelum melanjutkan.'
                    : 'Please fill out all required fields before proceeding.'
                );
                return;
            }

            if (currentStepIndex < wizardSteps.length - 1) {
                currentStepIndex++;
                updateWizard();
            } else {
                // Last step: Submit the wizard
                const successBlock = document.getElementById('wizard-success-block');
                const formInputsBlock = document.getElementById('wizard-form-inputs');
                
                if (successBlock && formInputsBlock) {
                    formInputsBlock.style.display = 'none';
                    successBlock.style.display = 'block';
                    nextBtn.style.display = 'none';
                    prevBtn.style.display = 'none';
                    
                    // Display details inputted
                    const name = document.getElementById('reg_name').value;
                    const scheme = document.getElementById('reg_scheme').options[document.getElementById('reg_scheme').selectedIndex].text;
                    
                    document.getElementById('summary-name').textContent = name;
                    document.getElementById('summary-scheme').textContent = scheme;
                }
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStepIndex > 0) {
                currentStepIndex--;
                updateWizard();
            }
        });

        // Initialize UI
        updateWizard();
    }

    // 4. Scroll Animations (Fade In)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in-on-scroll').forEach((el) => {
        observer.observe(el);
    });
});
