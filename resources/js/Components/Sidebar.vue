<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import Menu from 'primevue/menu';

const props = defineProps({
    collapsed: {
        type: Boolean,
        default: false
    }
});

const page = usePage();

const menuItems = ref([
    {
        label: 'Main',
        items: [
            {
                label: 'Overview',
                icon: 'pi pi-dashboard',
                route: 'dashboard',
                active: route().current('dashboard')
            },
            {
                label: 'User Management',
                icon: 'pi pi-users',
                route: '#',
                active: false
            },
            {
                label: 'Course Catalog',
                icon: 'pi pi-book',
                route: '#',
                active: false
            },
            {
                label: 'Enrollment',
                icon: 'pi pi-id-card',
                route: '#',
                active: false
            }
        ]
    },
    {
        label: 'System',
        items: [
            {
                label: 'Faculty Directory',
                icon: 'pi pi-address-book',
                route: '#',
                active: false
            },
            {
                label: 'Settings',
                icon: 'pi pi-cog',
                route: '#',
                active: false
            }
        ]
    }
]);
</script>

<template>
    <div 
        class="flex flex-col h-full bg-surface-container-low border-r border-outline-variant transition-all duration-300 ease-in-out"
        :class="[collapsed ? 'w-20' : 'w-72']"
    >
        <!-- Logo Section -->
        <div class="flex items-center shrink-0 overflow-hidden h-20 transition-all duration-300" :class="[collapsed ? 'justify-center px-2' : 'gap-4 p-6']">
            <div class="bg-primary flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-on-primary shadow-lg ring-1 ring-white/20">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">account_balance</span>
            </div>
            <div v-if="!collapsed" class="transition-opacity duration-300" :class="{ 'opacity-0': collapsed, 'opacity-100': !collapsed }">
                <h2 class="font-headline text-lg font-black leading-tight text-primary whitespace-nowrap">Academic Admin</h2>
                <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/70 whitespace-nowrap">Central Intelligence</p>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="flex-1 overflow-y-auto px-4 custom-scrollbar">
            <Menu :model="menuItems" class="w-full border-none bg-transparent pt-2" :pt="{
                root: { class: 'bg-transparent border-none' },
                submenuHeader: { class: collapsed ? 'hidden' : 'text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant/50 px-4 py-4 bg-transparent mt-4' },
                menuitem: { class: 'mb-1' }
            }">
                <template #item="{ item }">
                    <Link 
                        v-if="item.route !== '#'"
                        :href="route(item.route)" 
                        class="flex items-center rounded-xl py-3 text-sm transition-all duration-200 group relative"
                        :class="[
                            item.active ? 'bg-primary text-on-primary shadow-md' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface',
                            collapsed ? 'justify-center px-0 mx-2' : 'gap-3 px-4'
                        ]"
                        v-tooltip.right="collapsed ? item.label : null"
                    >
                        <i :class="[item.icon, 'text-base shrink-0']"></i>
                        <span v-if="!collapsed" class="font-bold transition-opacity duration-300 whitespace-nowrap">{{ item.label }}</span>
                        
                        <!-- Tooltip-like effect for collapsed state if desired or just use PrimeVue tooltip -->
                        <div v-if="collapsed" class="fixed left-20 bg-inverse-surface text-inverse-on-surface px-2 py-1 rounded text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity ml-2 z-[100] whitespace-nowrap">
                            {{ item.label }}
                        </div>
                    </Link>
                    <div 
                        v-else
                        class="flex items-center rounded-xl py-3 text-sm transition-all duration-200 cursor-pointer group relative"
                        :class="[
                            item.active ? 'bg-primary text-on-primary shadow-md' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface',
                            collapsed ? 'justify-center px-0 mx-2' : 'gap-3 px-4'
                        ]"
                    >
                        <i :class="[item.icon, 'text-base shrink-0']"></i>
                        <span v-if="!collapsed" class="font-bold whitespace-nowrap">{{ item.label }}</span>
                        
                        <div v-if="collapsed" class="fixed left-20 bg-inverse-surface text-inverse-on-surface px-2 py-1 rounded text-xs opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity ml-2 z-[100] whitespace-nowrap">
                            {{ item.label }}
                        </div>
                    </div>
                </template>
            </Menu>
        </div>

        <!-- Footer Section -->
        <div class="mt-auto p-4 shrink-0">
            <div v-if="!collapsed" class="mb-4 rounded-2xl bg-primary-container/10 p-4 ring-1 ring-primary-container/20 transition-all">
                <div class="mb-1 flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-primary/70">System Status</div>
                <div class="flex items-center gap-2 text-xs font-bold text-primary">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span>
                    Active
                </div>
            </div>
            <div v-else class="flex justify-center mb-4 transition-all">
                <span class="h-3 w-3 animate-pulse rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(var(--primary), 0.1);
    border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
    background: rgba(var(--primary), 0.2);
}
</style>
