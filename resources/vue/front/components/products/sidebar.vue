<template>
    <div class="sidebar">
        <div class="sidebar__item">
                    <input type="text" v-model="search" name="search" placeholder="Search">
        </div>

        <div class="sidebar__item">
            <h4>Categories</h4>
            <ul>
                <li v-for="category in categories">
                    <input type="checkbox" name="categories[]" v-model="checkedCategories" :value="category.id" @change="handleCategory(category.id)"><label class="pl-2">{{ category.name }}</label>
                </li>
            </ul>
        </div>
        <div class="sidebar__item" v-if="filteredSubCategories.length">
            <h4>Sub Categories</h4>
            <ul>
                <li v-for="subCategory in filteredSubCategories">
                    <input type="checkbox" name="subCategories[]" v-model="checkedSubCategories" :value="subCategory.id" @change="handleSubCategory(subCategory.id)"><label class="pl-2">{{ subCategory.name }}</label>
                </li>
            </ul>
        </div>
        <div class="sidebar__item" v-if="filteredBrands.length">
            <h4>Brands</h4>
            <ul>
                <li v-for="brand in filteredBrands">
                    <input type="checkbox" name="brands[]" v-model="checkedBrands" :value="brand.id"><label class="pl-2">{{ brand.name }}</label>
                </li>
            </ul>
        </div>
        <div class="sidebar__item">
            <h4>Price</h4>
            <div class="price-range-wrap">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                     data-min="10" data-max="540">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
                <div class="range-slider">
                    <div class="price-input">
                        <input type="text" id="minamount">
                        <input type="text" id="maxamount">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let self = this;
            self.$nextTick(function () {
                self.filteredSubCategories = []
                if(Object.keys(self.inputs).length) {
                    self.handleChecked(self.inputs);
                    self.handleSearch(self.inputs);
                }
            })
        },
        data() {
            return {
                checkedCategories: [],
                checkedSubCategories: [],
                checkedBrands: [],
                filteredSubCategories : [],
                filteredBrands: [],
                search: '',
            }
        },
        props: {
            categories: {
                type: Array,
                default() {
                    return [];
                }
            },
            subCategories: {
                type: Array,
                default() {
                    return [];
                }
            },
            brands: {
                type: Array,
                default() {
                    return [];
                }
            },
            inputs: {
                type: Object,
                default() {
                    return {};
                }
            }
        },
        methods : {
            handleSearch(data) {
                let self = this;
                self.search = data.search;
            },
            handleCategory(id) {
                let self = this;
                self.handleFiteredSubCategory(id);
                self.handleFiteredBrands(id);
            },
            handleSubCategory(id) {
                let self = this;
                self.handleFiteredBrands(id);
            },
            handleFiteredSubCategory(id) {
                let self = this;
                let pull = true;
                _.forEach(self.checkedCategories, function(obj) {
                    if(obj == id) {
                        pull = false;
                    }
                });
                let scData = _.filter(self.subCategories, function(f) {
                    return f.parent_id == id;
                });
                _.forEach(scData, function(obj) {
                    if(pull) {
                         _.remove(self.filteredSubCategories, function(n) {
                             _.remove(self.checkedSubCategories, function(n1) {
                                 return n.id == n1;
                             })
                             self.handleFiteredBrands(n.id);
                             return n.parent_id == id;
                         })
                    }
                    else {
                        self.filteredSubCategories.push(obj);
                    }
                });
            },
            handleFiteredBrands(id) {
                let self = this;
                let pull = true;
                _.forEach(self.checkedCategories, function(obj) {
                    if(obj == id) {
                        pull = false;
                    }
                });
                _.forEach(self.checkedSubCategories, function(obj) {
                    if(obj == id) {
                        pull = false;
                    }
                });
                let bData = _.filter(self.brands, function(f) {
                    return f.category_id == id;
                });
                _.forEach(bData, function(obj) {
                    if(pull) {
                        _.remove(self.filteredBrands, function(n) {
                            _.remove(self.checkedBrands, function(n1) {
                                return n.id == n1;
                            })
                            return n.category_id == id;
                        })
                    }
                    else {
                        self.filteredBrands.push(obj);
                    }
                });
            },
            handleChecked(data) {
                let self = this;
                if(data.categories) {
                    _.forEach(data.categories, function(obj) {
                        self.checkedCategories.push(obj);
                        self.handleCategory(obj);
                    });
                }
                if(data.subCategories) {
                    _.forEach(data.subCategories, function(obj) {
                        self.checkedSubCategories.push(obj);
                        self.handleSubCategory(obj);
                    });
                }
                if(data.brands) {
                    _.forEach(data.brands, function(obj) {
                        self.checkedBrands.push(obj);
                    });
                }
            }
        }
    }
</script>
