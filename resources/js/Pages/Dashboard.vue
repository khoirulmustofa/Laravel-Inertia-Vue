<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Tag from 'primevue/tag';

const admissions = [
    { id: 'AIS-2024-8812', name: 'Eleanor Wright', email: 'eleanor.w@archive.edu', program: 'B.Sc. Computer Science', status: 'Approved', date: '2 mins ago', initial: 'EW' },
    { id: 'AIS-2024-7729', name: 'Julian Brooks', email: 'j.brooks@archive.edu', program: 'MBA Digital Transformation', status: 'Review Pending', date: '15 mins ago', initial: 'JB' },
    { id: 'AIS-2024-9003', name: 'Marcus Thorne', email: 'm.thorne@archive.edu', program: 'B.A. Political Science', status: 'Approved', date: '42 mins ago', initial: 'MT' },
];

const getStatusSeverity = (status) => {
    switch (status) {
        case 'Approved': return 'success';
        case 'Review Pending': return 'warn';
        default: return 'info';
    }
};
</script>

<template>
    <Head title="Institutional Overview" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-end justify-between">
                <div>
                    <h1 class="font-headline text-on-surface text-3xl font-extrabold tracking-tight">Institutional Overview</h1>
                    <p class="font-body text-on-surface-variant mt-1 font-medium">Academic Year 2023 - 2024 • Semester 2</p>
                </div>
                <div class="flex gap-3">
                    <Button label="Generate Term Report" icon="pi pi-file-pdf" severity="secondary" outlined class="rounded-xl border-surface-container-high font-bold" />
                    <Button label="New Registration" icon="pi pi-plus" class="rounded-xl font-bold shadow-lg shadow-primary/20" />
                </div>
            </div>
        </template>

        <div class="space-y-8">
            <!-- Bento Grid Metrics -->
            <section class="grid grid-cols-1 gap-6 md:grid-cols-4 lg:grid-cols-6">
                <!-- Enrollment Card -->
                <div class="bg-surface-container-lowest group relative flex flex-col justify-between overflow-hidden rounded-3xl p-8 shadow-sm ring-1 ring-outline-variant/30 md:col-span-2 lg:col-span-3">
                    <div class="z-10">
                        <div class="mb-6 flex items-start justify-between">
                            <span class="text-primary text-[10px] font-black uppercase tracking-[0.2em]">Student Enrollment</span>
                            <span class="bg-primary/10 text-primary rounded-full px-3 py-1 text-[10px] font-black italic">+12% vs LY</span>
                        </div>
                        <div class="flex items-baseline gap-3">
                            <span class="font-headline text-on-surface text-6xl font-black tracking-tighter">14,208</span>
                            <span class="text-on-surface-variant text-sm font-bold opacity-60">Undergraduates</span>
                        </div>
                        <div class="mt-10 flex h-20 items-end gap-1.5">
                            <div class="bg-primary/20 h-[40%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[60%]"></div>
                            <div class="bg-primary/20 h-[60%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[80%]"></div>
                            <div class="bg-primary/20 h-[45%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[65%]"></div>
                            <div class="bg-primary h-[90%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[100%]"></div>
                            <div class="bg-primary/20 h-[70%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[90%]"></div>
                            <div class="bg-primary/20 h-[85%] flex-1 rounded-t-xl transition-all duration-700 group-hover:h-[95%]"></div>
                        </div>
                    </div>
                </div>

                <!-- Faculty Card -->
                <div class="bg-surface-container-lowest flex flex-col justify-between rounded-3xl p-8 shadow-sm ring-1 ring-outline-variant/30 md:col-span-2 lg:col-span-3">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <span class="text-on-surface-variant text-[10px] font-black uppercase tracking-[0.2em] opacity-70">Faculty Capacity</span>
                            <Tag value="Stable" severity="info" class="font-black" />
                        </div>
                        <div class="flex items-baseline gap-3">
                            <span class="font-headline text-on-surface text-6xl font-black tracking-tighter">942</span>
                            <span class="text-on-surface-variant text-sm font-bold opacity-60">Active Members</span>
                        </div>
                    </div>
                    <div class="mt-8 space-y-5">
                        <div class="space-y-2">
                            <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                                <span>Doctorate Holders</span>
                                <span class="text-primary">78%</span>
                            </div>
                            <div class="bg-surface-container h-2 w-full overflow-hidden rounded-full p-0.5">
                                <div class="bg-primary h-full w-[78%] rounded-full shadow-[0_0_8px_rgba(0,72,141,0.3)]"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Cards -->
                <div class="bg-surface-container-lowest rounded-3xl p-8 shadow-sm ring-1 ring-outline-variant/30 lg:col-span-2">
                    <div class="bg-secondary-container/30 text-secondary mb-6 flex h-12 w-12 items-center justify-center rounded-2xl ring-1 ring-secondary-container">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1">description</span>
                    </div>
                    <h3 class="font-headline mb-2 text-xl font-black text-on-surface">Academic Records</h3>
                    <p class="text-on-surface-variant text-xs font-medium leading-relaxed opacity-70">421 pending transcripts requiring administrative review within the next 24 hours.</p>
                    <Button label="View Queue" icon="pi pi-arrow-right" iconPos="right" text class="mt-6 p-0 text-xs font-black uppercase tracking-widest" />
                </div>

                <div class="bg-primary relative overflow-hidden rounded-3xl p-8 text-on-primary shadow-xl lg:col-span-2">
                    <div class="relative z-10">
                        <h3 class="font-headline mb-3 text-xl font-black">Campus Security</h3>
                        <div class="mb-4 flex items-center gap-2">
                            <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,0.8)]"></span>
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-80">All protocols operational</span>
                        </div>
                        <p class="text-xs font-medium leading-relaxed opacity-70">Latest security audit completed with 0 critical vulnerabilities detected across all networks.</p>
                    </div>
                    <span class="material-symbols-outlined absolute -bottom-8 -right-8 rotate-12 text-[160px] opacity-10" style="font-variation-settings: 'FILL' 1">security</span>
                </div>

                <div class="bg-surface-container-lowest rounded-3xl p-8 shadow-sm ring-1 ring-outline-variant/30 lg:col-span-2">
                    <div class="bg-tertiary-fixed text-tertiary mb-6 flex h-12 w-12 items-center justify-center rounded-2xl ring-1 ring-tertiary-container">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1">campaign</span>
                    </div>
                    <h3 class="font-headline mb-2 text-xl font-black text-on-surface">Bulletins</h3>
                    <p class="text-on-surface-variant text-xs font-medium leading-relaxed opacity-70">Final call for Fall 2024 research grant applications. Portal closes at midnight.</p>
                    <Button label="Post Notice" icon="pi pi-arrow-right" iconPos="right" text severity="warning" class="mt-6 p-0 text-xs font-black uppercase tracking-widest" />
                </div>
            </section>

            <!-- Admissions Table Area -->
            <section class="bg-surface-container-lowest overflow-hidden rounded-3xl shadow-sm ring-1 ring-outline-variant/30">
                <div class="bg-surface-container-low/30 flex items-center justify-between border-b border-outline-variant/30 px-8 py-6">
                    <div>
                        <h2 class="font-headline text-xl font-black text-on-surface">Recent Admissions Actions</h2>
                        <p class="text-on-surface-variant text-[10px] font-bold uppercase tracking-widest opacity-60">Real-time log of registration updates</p>
                    </div>
                    <Button label="View All Activities" severity="secondary" text class="text-xs font-black uppercase tracking-widest" />
                </div>

                <DataTable :value="admissions" class="p-datatable-sm" :pt="{
                    headerRow: { class: 'bg-surface-container-low/50 font-black text-[10px] uppercase tracking-[0.2em] text-on-surface-variant' },
                    bodyRow: { class: 'hover:bg-surface-bright transition-colors' }
                }">
                    <Column field="name" header="Student Name">
                        <template #body="slotProps">
                            <div class="flex items-center gap-4 py-2">
                                <div class="bg-primary-container text-on-primary-container flex h-9 w-9 items-center justify-center rounded-full text-xs font-black shadow-sm ring-1 ring-white/20">
                                    {{ slotProps.data.initial }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-on-surface">{{ slotProps.data.name }}</p>
                                    <p class="text-[10px] font-bold text-on-surface-variant opacity-60">{{ slotProps.data.email }}</p>
                                </div>
                            </div>
                        </template>
                    </Column>
                    <Column field="id" header="ID Number">
                        <template #body="slotProps">
                            <span class="font-mono text-xs font-bold text-on-surface-variant">{{ slotProps.data.id }}</span>
                        </template>
                    </Column>
                    <Column field="program" header="Program">
                        <template #body="slotProps">
                            <span class="text-xs font-bold text-on-surface">{{ slotProps.data.program }}</span>
                        </template>
                    </Column>
                    <Column field="status" header="Status">
                        <template #body="slotProps">
                            <Tag :value="slotProps.data.status" :severity="getStatusSeverity(slotProps.data.status)" class="text-[9px] font-black uppercase tracking-tighter" />
                        </template>
                    </Column>
                    <Column field="date" header="Date" headerClass="text-right">
                        <template #body="slotProps">
                            <p class="text-right text-xs font-bold text-on-surface-variant opacity-60">{{ slotProps.data.date }}</p>
                        </template>
                    </Column>
                </DataTable>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style>
/* PrimeVue overrides for specific aesthetics */
.p-datatable .p-datatable-thead > tr > th {
    background: transparent !important;
    border: none !important;
    padding: 1.5rem 2rem !important;
}

.p-datatable .p-datatable-tbody > tr > td {
    border-color: rgba(194, 198, 212, 0.2) !important;
    padding: 1rem 2rem !important;
}

.p-tag {
    border-radius: 0.5rem !important;
}
</style>
