<template>
    <app-layout>
        <div class="mt-8 lg:mt-16 text-gray-400 text-xl">
            <div class="pt-8 mx-auto flex justify-center gap-2">
                <div className="flex flex-col gap-2">
                    <div
                        :key="commit.url"
                        v-for="commit in commits"
                        class="bg-customBlack p-3"
                    >
                        <div>{{ commit.commit.author.date }}</div>
                        <div>{{ commit.commit.message }}</div>
                    </div>
                </div>
            </div>
        </div>
        <h1>test</h1>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import { Octokit } from '@octokit/rest'

export default {
    components: {
        AppLayout,
        Welcome,
    },
    data() {
        return {
            commits: [],
            octokit: new Octokit({ auth: process.env.GITHUB_TOKEN }),
        }
    },
    props: [],
    methods: {
        getHumanDate: function (date) {
            return moment(date).format('MM/DD/YY')
        },
    },
    created: function () {
        this.octokit.rest.repos
            .listCommits({
                owner: 'jlunardini',
                repo: 'threadwatch2',
                per_page: '100',
            })
            .then(({ data }) => {
                this.commits = data
            })
    },
}
</script>
