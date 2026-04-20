<script setup>
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="mt-auto border-t border-outline-variant/30 bg-surface-container-low px-8 py-6 text-xs text-on-surface-variant/50">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <div class="flex items-center gap-6">
                <span class="font-black uppercase tracking-widest text-primary/60">Luminous Archive</span>
                <span class="hidden md:inline">© {{ currentYear }} • Academic Information System</span>
            </div>
            <div class="flex items-center gap-6 font-bold">
                <a href="#" class="hover:text-primary transition-colors">Documentation</a>
                <a href="#" class="hover:text-primary transition-colors">Support</a>
                <a href="#" class="hover:text-primary transition-colors">v2.4.0</a>
            </div>
        </div>
    </footer>
</template>
