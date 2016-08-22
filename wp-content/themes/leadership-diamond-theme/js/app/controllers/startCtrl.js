diamondApp.controller('startCtrl', ['$scope', 'startSvc', 'scrollSvc', '$location', '$timeout', '$anchorScroll', function ($scope, startSvc, scrollSvc, $location, $timeout, $anchorScroll) {
    //Scope variables
    $scope.allQuestionPosts = [];
    $scope.allTranslations = [];
    $scope.allCourses = [];
    $scope.postInFocus = null;
    $scope.hasViewedAboutDiamond = false;
    $scope.oneAtATime = false;
    $scope.footerContent = [];
    $scope.currentLanguage = currentLanguage;
    $scope.latestClickedPostId = "post-1"; //default is 1
    $scope.aQuestionWasClicked = false;
    $scope.languages = [
        {
            "name": "Svenska",
            "url": baseUrl.concat("/sv")
        },

        {
            "name": "English",
            "url": baseUrl.concat("/en")
        }
    ];
    //Loading handling
    $scope.isLoaded = {
        "translations": false,
        "questionPosts": true,
        "footer": true
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
        $scope.readMore = $scope.getTranslationByContent('readmore');
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
        $scope.firstExample = $scope.getTranslationByContent('firstexample');
        $scope.coursesPrograms = $scope.getTranslationByContent('coursesprograms');
        $scope.whyTheDiamond = $scope.getTranslationByContent('whythediamond');
        $scope.graphTexts = {
            "graph1": $scope.getTranslationByContent('graph1'),
            "graph2": $scope.getTranslationByContent('graph2'),
            "graph3": $scope.getTranslationByContent('graph3')
        };
    };
    //Scope functions on page load
    $scope.getTranslationByContent = function (content) {
        var translation = $scope.allTranslations.filter(function (item) {
            return item.content === content;
        });
        return translation[0];
    };
    //On Document ready
    jQuery(document).ready(function () {
        jQuery("#sidr-main .sidr-inner ul li a").each(function (elem) {
            console.log(this);
            jQuery(this).attr("onclick", "closeMenu()");
        });
        jQuery("#sidr-main").removeClass("right");
        jQuery("#sidr-main").addClass("left");
        //Adding index to post ids
        var list = jQuery(".question-card .panel-title a");
        jQuery.each(list, function (index, value) {
            postIndex = index + 1;
            jQuery(value).attr("href", "#post-" + postIndex);
        });
    });
    $scope.getTranslationByContent = function (content) {
        var translation = $scope.allTranslations.filter(function (item) {
            return item.content === content;
        });
        return translation[0];
    };
    $scope.trimPostContent = function (content) {
        return content.replace(/<\/?[^>]+(>|$)/g, "").replace(/(\r\n|\n|\r)/gm, " ").trim();
    };
    //    $scope.defineQuestionPostObjects = function () {
    //        var count = 1;
    //        angular.forEach($scope.allQuestionPosts, function (post) {
    //            post["showDescription"] = false;
    //            post["inFocus"] = false;
    //            post["index"] = parseInt(post['custom_fields']['wpcf-index'][0]);
    //            post["solution"] = (post['custom_fields']['wpcf-answer'][0]);
    //            post["isRead"] = false;
    //            post.content = $scope.trimPostContent(post.content);
    //            if (count === $scope.allQuestionPosts.length) {
    //                $scope.isLoaded.questionPosts = true;
    //            };
    //            count++;
    //        });
    //    };
    $scope.getFooterSubGroupName = function (groupId) {
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
            groupName = "none";
            break;
        }
        return groupName;
    };
    $scope.prettyfyTranslations = function (translations) {
        angular.forEach(translations, function (post) {
            var transObject = {
                id: post.id,
                content: $scope.trimPostContent(post.content),
                title: post.title
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
            $scope.getFooterContent();
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
        var postType = 'footer-entry';
        startSvc.getPostsByType(postType).then(function (response) {
            $scope.footerContent = response.data.posts;
            angular.forEach($scope.footerContent, function (entry) {
                if ('wpcf-footer-group' in entry.custom_fields) {
                    entry["footerGroup"] = parseInt(entry.custom_fields['wpcf-footer-group'][0]);
                };
                if ('wpcf-sub-group' in entry.custom_fields) {
                    entry["subGroup"] = $scope.getFooterSubGroupName(entry.custom_fields['wpcf-sub-group'][0]);
                };
                if ('wpcf-link' in entry.custom_fields) {
                    entry["link"] = entry.custom_fields['wpcf-link'][0];
                };
            });
            console.log($scope.footerContent);
            $scope.isLoaded.footer = true;
        }).catch(function () {
            console.log("Error in get all partners");
            $scope.isLoaded.footer = true;
        });
    };

    $scope.setLatestClickedPostId = function (postId) {
        $scope.aQuestionWasClicked = true;
        $scope.latestClickedPostId = postId;
        console.log($scope.latestClickedPostId);
    };

    $scope.openOrCloseQuestion = function (postIndex) {
        //var postIsOpen = jQuery("#post-" + postIndex + " .question-card .collapse").hasClass("in");
        jQuery("#post-" + nextPostIndex + " .panel-title a").click();
        //If the next question post is not open - open it. 
        //        if (!postIsOpen) {
        //            $timeout(function () {
        //                jQuery("#post-" + nextPostIndex + " .panel-title a").click();
        //            }, 300);

        //        }
    };
    $scope.getAllTranslations();
    $scope.getAllCourses();
    $scope.goToElement = function (eID) {
        $location.hash(eID);
        scrollSvc.scrollTo(eID);
    };
}]);