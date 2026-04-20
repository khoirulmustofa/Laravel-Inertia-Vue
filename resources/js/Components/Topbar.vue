<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Avatar from 'primevue/avatar';
import InputText from 'primevue/inputtext';
import Menu from 'primevue/menu';

const props = defineProps({
    isSidebarCollapsed: {
        type: Boolean,
        default: false
    },
    user: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['toggle-sidebar', 'toggle-mobile-menu']);

const userMenu = ref();
const userMenuItems = ref([
    {
        label: 'Profile',
        icon: 'pi pi-user',
        command: () => {
             window.location.href = route('profile.edit');
        }
    },
    {
        separator: true
    },
    {
        label: 'Log Out',
        icon: 'pi pi-sign-out',
        command: () => {
            useForm({}).post(route('logout'));
        }
    }
]);

const toggleUserMenu = (event) => {
    userMenu.value.toggle(event);
};

const handleLinkClick = (name) => {
   // handle active state or navigation
}
</script>

<template>
    <header class="sticky top-0 z-40 border-b border-outline-variant bg-surface/80 shadow-sm backdrop-blur-xl h-20 shrink-0">
        <div class="flex h-full w-full items-center justify-between px-6">
            <div class="flex items-center gap-4">
               
                
                <!-- Mobile Toggle -->
                <Button 
                    icon="pi pi-bars" 
                    severity="secondary" 
                    text 
                    rounded 
                    class="lg:hidden" 
                    @click="emit('toggle-mobile-menu')" 
                />

                <div class="h-6 border-l border-outline-variant/30 hidden lg:block mx-2"></div>

                <h1 class="font-headline text-xl font-extrabold tracking-tight text-primary hidden sm:block">Luminous Archive</h1>
                
                <nav class="hidden xl:flex items-center gap-6 text-xs font-black uppercase tracking-widest ml-8">
                    <Link :href="route('dashboard')" :class="[route().current('dashboard') ? 'text-primary' : 'text-on-surface-variant hover:text-primary']" class="relative py-2 transition-colors">
                        Dashboard
                        <div v-if="route().current('dashboard')" class="absolute -bottom-3 left-0 h-1 w-full rounded-t-full bg-primary"></div>
                    </Link>
                    <a href="#" class="text-on-surface-variant transition-colors hover:text-primary">Admissions</a>
                    <a href="#" class="text-on-surface-variant transition-colors hover:text-primary">Academic Records</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center">
                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText placeholder="Quick search..." class="w-48 lg:w-64 rounded-xl border-outline-variant bg-surface-container-low text-xs focus:ring-primary" />
                    </span>
                </div>

                <div class="flex items-center gap-1">
                    <Button icon="pi pi-bell" severity="secondary" rounded text aria-label="Notifications" size="small" />
                    <Button icon="pi pi-question-circle" severity="secondary" rounded text aria-label="Help" size="small" />
                </div>

                <div class="h-8 border-l border-outline-variant mx-2"></div>

                <div class="flex items-center gap-3 cursor-pointer select-none group" @click="toggleUserMenu">
                    <div class="hidden text-right lg:block">
                        <p class="text-xs font-black leading-none text-on-surface group-hover:text-primary transition-colors">{{ user.name }}</p>
                        <p class="mt-1 text-[9px] font-black uppercase tracking-tighter text-on-surface-variant/50">Admin</p>
                    </div>
                    <Avatar :label="user.name.charAt(0)" size="large" shape="circle" class="bg-primary-container text-on-primary-container font-black shadow-sm ring-1 ring-primary/10" />
                    <i class="pi pi-chevron-down text-[10px] text-on-surface-variant/50 group-hover:text-primary transition-all"></i>
                </div>
                
                <Menu ref="userMenu" :model="userMenuItems" :popup="true" class="rounded-xl shadow-xl border-outline-variant transform translate-y-2" />
            </div>
        </div>
    </header>
</template>

<style scoped>
:deep(.p-inputtext) {
    padding-top: 0.6rem;
    padding-bottom: 0.6rem;
}
</style>
