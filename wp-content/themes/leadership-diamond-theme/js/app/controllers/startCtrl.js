diamondApp.controller('startCtrl', ['$scope', 'startSvc', 'scrollSvc', '$location', '$timeout', '$anchorScroll', function ($scope, startSvc, scrollSvc, $location, $timeout, $anchorScroll) {
    //Scope variables
    $scope.allQuestionPosts = [];
    $scope.allTranslations = [];
    $scope.allCourses = [];
    $scope.allContacts = [];
    $scope.allPartners = [];
    $scope.postInFocus = null;
    $scope.hasViewedAboutDiamond = false;
    $scope.oneAtATime = true;
    $scope.currentLanguage = currentLanguage;
    $scope.languages = [
        {
            "name": "Svenska"
            , "url": baseUrl.concat("/sv")
        }

        , {
            "name": "English"
            , "url": baseUrl.concat("/en")
        }
    ];
    //Loading handling
    $scope.isLoaded = {
        "translations": false
        , "questionPosts": false
        , "contacts": false
        , "partners": false
    };
    $scope.allLoaded = false;
    $scope.$watch('isLoaded', function () {
        var allLoaded = true;
        console.log($scope.isLoaded);
        angular.forEach($scope.isLoaded, function (value) {
            if (value === false) {
                allLoaded = false;
            };
        });
        if (allLoaded) {
            $scope.allLoaded = true;
        };
    }, true);
    // Sets custom strings from translation custom post type
    $scope.setCustomStrings = function () {
        $scope.leadershipOS = $scope.getTranslationByContent('leadershipOS');
        $scope.leadershipdiamond = $scope.getTranslationByContent('leadershipdiamond');
        $scope.nothingButApps = $scope.getTranslationByContent('nothingbutapps');
        $scope.readMore = "Läs mer"; // $scope.getTranslationByContent('nothingbutapps');
        $scope.howToHandle = $scope.getTranslationByContent('howtohandle');
        $scope.close = $scope.getTranslationByContent('close');
        $scope.goToNextPost = $scope.getTranslationByContent('gotonextpost');
        $scope.aboutDiamond = $scope.getTranslationByContent('aboutdiamond');
        $scope.contact = $scope.getTranslationByContent('contact');
        $scope.leadershipPartners = $scope.getTranslationByContent('leadershippartners');
        $scope.courseIntro = $scope.getTranslationByContent('courseintro');
        $scope.diamondAboutText = $scope.getTranslationByContent('diamondabouttext');
        $scope.sweden = $scope.getTranslationByContent('sweden');
        $scope.india = $scope.getTranslationByContent('india');
        $scope.groupNames = ["none", $scope.sweden.title, $scope.india.title];
        $scope.goToDiamond = $scope.getTranslationByContent('gotodiamond');
    };
    //Scope functions on page load
    $scope.getTranslationByContent = function (content) {
        var translation = $scope.allTranslations.filter(function (item) {
            return item.content === content;
        });
        return translation[0];
    };
    $scope.trimPostContent = function (content) {
        return content.replace(/<\/?[^>]+(>|$)/g, "").replace(/(\r\n|\n|\r)/gm, " ").trim();
    };
    $scope.defineQuestionPostObjects = function () {
        var count = 1;
        angular.forEach($scope.allQuestionPosts, function (post) {
            post["showDescription"] = false;
            post["inFocus"] = false;
            post["index"] = parseInt(post['custom_fields']['wpcf-index'][0]);
            post["solution"] = (post['custom_fields']['wpcf-answer'][0]);
        });
    };
    //On Document ready
    jQuery(document).ready(function () {
        console.log("ready!");
    });
    //Scope functions on page load
    $scope.getTranslationByContent = function (content) {
        var translation = $scope.allTranslations.filter(function (item) {
            return item.content === content;
        });
        return translation[0];
    };
    $scope.trimPostContent = function (content) {
        return content.replace(/<\/?[^>]+(>|$)/g, "").replace(/(\r\n|\n|\r)/gm, " ").trim();
    };
    $scope.defineQuestionPostObjects = function () {
        var count = 1;
        angular.forEach($scope.allQuestionPosts, function (post) {
            post["showDescription"] = false;
            post["inFocus"] = false;
            post["index"] = parseInt(post['custom_fields']['wpcf-index'][0]);
            post["solution"] = (post['custom_fields']['wpcf-answer'][0]);
            post["isRead"] = false;
            post.content = $scope.trimPostContent(post.content);
            if (count === $scope.allQuestionPosts.length) {
                $scope.isLoaded.questionPosts = true;
            };
            count++;
        });
    };
    $scope.getGroupName = function (groupId) {
        groupName = "";
        switch (groupId) {
        case "1":
            groupName = $scope.sweden.title;
            break;
        case "2":
            groupName = $scope.india.title;
            break;
        case "3":
            groupName = "none"
            break;
        default:
            groupName = "";
            break;
        }
        return groupName;
    };
    $scope.getAllQuestionPosts = function () {
        startSvc.getAllQuestionPosts().then(function (response) {
            $scope.allQuestionPosts = response.data.posts;
            console.log($scope.allQuestionPosts);
            $scope.defineQuestionPostObjects();
        }).catch(function () {
            $scope.isLoaded.questionPosts = true;
        });
    };
    $scope.prettyfyTranslations = function (translations) {
        angular.forEach(translations, function (post) {
            var transObject = {
                id: post.id
                , content: $scope.trimPostContent(post.content)
                , title: post.title
            }
            if ('wpcf-extra-content' in post.custom_fields) {
                transObject["extraContent"] = post.custom_fields['wpcf-extra-content'][0];
            };
            $scope.allTranslations.push(transObject);
        });
        console.log("all translations");
        console.log($scope.allTranslations);
        //Set the custom strings
        $scope.setCustomStrings();
    };
    $scope.getAllTranslations = function () {
        var postType = 'translation';
        startSvc.getPostsByType(postType).then(function (response) {
            $scope.prettyfyTranslations(response.data.posts);
            $scope.isLoaded.translations = true;
        }).catch(function () {
            console.log("Error in get all translations");
            $scope.isLoaded.translations = true;
        });
    };
    $scope.getAllCourses = function () {
        var postType = 'course';
        startSvc.getPostsByType(postType).then(function (response) {
            $scope.allCourses = response.data.posts;
            angular.forEach($scope.allCourses, function (course) {
                course.content = $scope.trimPostContent(course.content);
                if ('wpcf-course-index' in course.custom_fields) {
                    course["courseIndex"] = parseInt(course.custom_fields['wpcf-course-index'][0]);
                };
                if ('wpcf-level' in course.custom_fields) {
                    course["level"] = course.custom_fields['wpcf-level'][0];
                };
                course["isRead"] = false;
            });
            console.log("all courses");
            console.log($scope.allCourses);
            $scope.isLoaded.courses = true;
        }).catch(function () {
            console.log("Error in get all courses");
            $scope.isLoaded.courses = true;
        });
    };
    $scope.getFooterContent = function () {
        //Get contacts
        var postType = 'contact';
        startSvc.getPostsByType(postType).then(function (response) {
            $scope.allContacts = response.data.posts;
            angular.forEach($scope.allContacts, function (contact) {
                if ('wpcf-url' in contact.custom_fields) {
                    contact["url"] = contact.custom_fields['wpcf-url'][0];
                };
                if ('wpcf-sort-index' in contact.custom_fields) {
                    contact["index"] = parseInt(contact.custom_fields['wpcf-sort-index'][0]);
                };
                if ('wpcf-group' in contact.custom_fields) {
                    contact["group"] = $scope.getGroupName(contact.custom_fields['wpcf-group'][0]);
                };
            });
            console.log($scope.allContacts);
            $scope.isLoaded.contacts = true;
            //Get leadership partners
            var postType = 'partner';
            startSvc.getPostsByType(postType).then(function (response) {
                $scope.allPartners = response.data.posts;
                angular.forEach($scope.allPartners, function (partner) {
                    if ('wpcf-url' in partner.custom_fields) {
                        partner["url"] = partner.custom_fields['wpcf-url'][0];
                    };
                    if ('wpcf-sort-index' in partner.custom_fields) {
                        partner["index"] = parseInt(partner.custom_fields['wpcf-sort-index'][0]);
                    };
                    if ('wpcf-group' in partner.custom_fields) {
                        partner["group"] = $scope.getGroupName(partner.custom_fields['wpcf-group'][0]);
                    };
                });
                console.log($scope.allPartners);
                $scope.isLoaded.partners = true;
            }).catch(function () {
                console.log("Error in get all partners");
                $scope.isLoaded.partners = true;
            });
        }).catch(function () {
            console.log("Error in get all contacts");
            $scope.isLoaded.contacts = true;
        });
    };
    $scope.registerQuestionClick = function (post) {
        post.isRead = true;
        $scope.goToElement("post-" + post.index);
    };
    $scope.moveToNextPost = function (currentPost) {
        var nextPost = $scope.getQuestionPostByIndex(currentPost.index + 1);
        if (currentPost.index < $scope.allQuestionPosts.length) {
            $timeout(function () {
                jQuery("#post-" + nextPost.index + " a").click();
            });
        };
    };
    $scope.goToCourses = function () {
        $scope.goToElement("course");
    };
    $scope.getQuestionPostByIndex = function (postIndex) {
        var returnPost = null;
        angular.forEach($scope.allQuestionPosts, function (post) {
            if (post.index == postIndex) {
                returnPost = post;
            }
        });
        return returnPost;
    };
    $scope.getAllTranslations();
    $scope.getAllQuestionPosts();
    $scope.getAllCourses();
    $scope.getFooterContent();
    $scope.goToElement = function (eID) {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash(eID);
        // call $anchorScroll()
        scrollSvc.scrollTo(eID);
    };
}]);