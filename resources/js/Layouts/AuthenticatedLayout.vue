<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Sidebar from '@/Components/Sidebar.vue';
import Topbar from '@/Components/Topbar.vue';
import Footer from '@/Components/Footer.vue';
import Drawer from 'primevue/drawer';

const isSidebarCollapsed = ref(false);
const isMobileMenuVisible = ref(false);

const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
    // Save preference if needed
    localStorage.setItem('sidebarCollapsed', isSidebarCollapsed.value);
};

const toggleMobileMenu = () => {
    isMobileMenuVisible.value = !isMobileMenuVisible.value;
};

// Handle window resize for better responsive behavior
const handleResize = () => {
    if (window.innerWidth < 1024) {
        isSidebarCollapsed.value = false;
    }
};

onMounted(() => {
    const savedState = localStorage.getItem('sidebarCollapsed');
    if (savedState !== null) {
        isSidebarCollapsed.value = savedState === 'true';
    }
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
});
</script>

<template>
    <div class="text-on-surface min-h-screen bg-background font-body flex overflow-hidden">
        <!-- Desktop Sidebar -->
      
        <!-- Mobile Drawer Navigation -->
        <Drawer v-model:visible="isMobileMenuVisible" class="p-0 border-none bg-transparent" :pt="{
            root: { class: 'p-0 border-none' },
            header: { class: 'hidden' },
            content: { class: 'p-0 w-72 h-full' }
        }">
            <Sidebar :collapsed="false" class="w-72 h-full" />
        </Drawer>

        <!-- Main Content Area -->
        <div class="flex flex-1 flex-col min-w-0 h-screen overflow-hidden relative">
            <Topbar 
                :isSidebarCollapsed="isSidebarCollapsed" 
                :user="$page.props.auth.user"
                @toggle-sidebar="toggleSidebar"
                @toggle-mobile-menu="toggleMobileMenu"
            />

            <!-- Scrollable Content Section -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-surface-bright flex flex-col">
                <div class="flex-1">
                    <div class="mx-auto w-full">
                        <!-- Dynamic Header Slot -->
                        <div v-if="$slots.header" class="px-8 pt-8 pb-4">
                            <slot name="header" />
                        </div>

                        <!-- Main Slot Content -->
                        <div class="px-8 pb-12">
                            <slot />
                        </div>
                    </div>
                </div>

                <!-- Footer Component -->
                <Footer />
            </main>
        </div>
    </div>
</template>

<style>
/* Custom transitions for smoother UI */
.transition-all {
    transition-duration: 300ms;
}

/* Ensure PrimeVue Drawer (Sidebar) doesn't have default padding we don't want */
.p-drawer .p-drawer-content {
    padding: 0 !important;
}
</style>

<style>
.p-inputtext {
    border-radius: 0.75rem !important;
}
</style>
