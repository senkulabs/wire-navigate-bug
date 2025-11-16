import './bootstrap';

// Track if current navigation is a history navigation (back/forward button)
let isHistoryNavigation = false;

// Based on Livewire Navigate documentation (JavaScript hooks section):
// context.history indicates if navigation was triggered by back/forward button
document.addEventListener('livewire:navigate', (event) => {
    const context = event.detail;

    // Check if this is a back/forward button navigation
    isHistoryNavigation = context.history === true;
});

// After navigation completes, sync URL params with components on back/forward navigation
document.addEventListener('livewire:navigated', async () => {
    // Only refresh on back/forward button clicks, not regular navigation
    if (!isHistoryNavigation) return;

    // Get URL parameters from current page
    const url = new URL(window.location.href);
    const params = Object.fromEntries(url.searchParams);

    // Get all Livewire components on the page
    const livewireComponents = document.querySelectorAll('[wire\\:id]');

    for (const element of livewireComponents) {
        const componentId = element.getAttribute('wire:id');

        // Livewire.find() returns the $wire object directly (not a component with .$wire)
        // See: Livewire-JavaScript.md line 157
        const $wire = Livewire.find(componentId);

        if ($wire) {
            try {
                let propertiesSet = false;

                // Sync URL parameters with component properties
                // See: Livewire-JavaScript.md lines 320-322
                for (const [key, value] of Object.entries(params)) {
                    // Check if property exists on component using $get()
                    // Use !== undefined to handle falsy values (empty string, 0, false, null)
                    if ($wire.$get(key) !== undefined) {
                        await $wire.$set(key, value);
                        console.log(`✅ Set ${key} = ${value} on component:`, componentId);
                        propertiesSet = true;
                    } else {
                        console.log(`⚠️ Property '${key}' not found on component:`, componentId);
                    }
                }

                // After setting all properties, refresh the component to fetch new data
                // This is especially important for pagination which needs to refetch data
                if (propertiesSet) {
                    await $wire.$refresh();
                    console.log('✅ Component refreshed after setting properties:', componentId);
                } else if (Object.keys(params).length === 0) {
                    // If no params, still refresh to ensure component is in sync
                    await $wire.$refresh();
                    console.log('✅ Component refreshed (no params):', componentId);
                }
            } catch (error) {
                console.error('❌ Failed to sync component:', componentId, error);
            }
        }
    }

    // Reset flag
    isHistoryNavigation = false;
});
