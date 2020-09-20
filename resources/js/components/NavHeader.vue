<template>
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="text-center masthead-brand">Random Lovecraft</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a :class="getClass('/')" href="/">Home</a>
                <a :class="getClass('/about')" href="/about">About</a>
                <a :class="getClass('/api')" href="/api">API</a>
            </nav>

            <span class="clearfix"></span>
        </div>
    </header>
</template>

<script>
export default {
    methods : {
        getClass(path) {
            let classList = 'nav-link';
            if (path === document.location.pathname) {
                classList += ' active';
            }
            return classList;
        }
    }
}
</script>

<style scoped>
    .masthead {
        margin-bottom: 2rem;
    }

    .masthead-brand {
        margin-bottom: 0;
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        background-color: transparent;
        border-bottom: .25rem solid transparent;
        color: #ffffff;
    }

    .nav-masthead .nav-link.active {
        border-color: #ffffff;
    }

    .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
    }

    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }
        .nav-masthead {
            float: right;
        }
    }
</style>
