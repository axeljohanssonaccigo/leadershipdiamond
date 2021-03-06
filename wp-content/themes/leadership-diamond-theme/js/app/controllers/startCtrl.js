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
    $scope.allInputsValid = false;
    $scope.sendingMail = false;
    $scope.mailSuccess = false;
    $scope.mailFail = false;
    $scope.showInputError = false;
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
        $scope.leadershipOS = $scope.getTranslationByTitle('leadershipOS');
        $scope.leadershipdiamond = $scope.getTranslationByTitle('leadershipdiamond');
        $scope.nothingButApps = $scope.getTranslationByTitle('nothingbutapps');
        $scope.readMore = $scope.getTranslationByTitle('readmore');
        $scope.howToHandle = $scope.getTranslationByTitle('howtohandle');
        $scope.close = $scope.getTranslationByTitle('close');
        $scope.goToNextPost = $scope.getTranslationByTitle('gotonextpost');
        $scope.aboutDiamond = $scope.getTranslationByTitle('aboutdiamond');
        $scope.contact = $scope.getTranslationByTitle('contact');
        $scope.leadershipPartners = $scope.getTranslationByTitle('leadershippartners');
        $scope.courseIntro = $scope.getTranslationByTitle('courseintro');
        $scope.diamondAboutText = $scope.getTranslationByTitle('diamondabouttext');
        $scope.sweden = $scope.getTranslationByTitle('sweden');
        $scope.india = $scope.getTranslationByTitle('india');
        $scope.usa = $scope.getTranslationByTitle('usa');
        $scope.groupNames = ["none", $scope.sweden.content, $scope.india.content];
        $scope.goToDiamond = $scope.getTranslationByTitle('gotodiamond');
        $scope.firstExample = $scope.getTranslationByTitle('firstexample');
        $scope.coursesPrograms = $scope.getTranslationByTitle('coursesprograms');
        $scope.whyTheDiamond = $scope.getTranslationByTitle('whythediamond');
        $scope.commonProblems = $scope.getTranslationByTitle('commonproblems');
        $scope.backToLatestProblem = $scope.getTranslationByTitle('backtolatestproblem');
        $scope.formHeading1 = $scope.getTranslationByTitle('formheading1');
        $scope.formHeading2 = $scope.getTranslationByTitle('formheading2');
        $scope.wheelHeading = $scope.getTranslationByTitle('wheelheading');
        $scope.wheelText = $scope.getTranslationByTitle('wheeltext');
        $scope.sendingMailText = $scope.getTranslationByTitle('sendingmail');
        $scope.mailSuccessText = $scope.getTranslationByTitle('mailsuccess');
        $scope.mailFailText = $scope.getTranslationByTitle('mailfail');
        $scope.testTheTools = $scope.getTranslationByTitle('testthetools');
        $scope.diamondImageText = $scope.getTranslationByTitle('diamondimagetext');

        $scope.graphTexts = {
            "graph1": $scope.getTranslationByTitle('graph1'),
            "graph2": $scope.getTranslationByTitle('graph2'),
            "graph3": $scope.getTranslationByTitle('graph3')
        };
    };

    var isNullEmptyOrUndefined = function (value) {
        return value === null || value === undefined || value === "";
    };

    $scope.confAndSendMail = function () {
        //Prevent the default submit behavior
        event.preventDefault();
        //Check input values
        // $scope.showInputError = false;
        var allInputsValid = false;

        //Get input values
        var name = jQuery("#course form.wpcf7-form .your-name input").val();
        var email = jQuery("#course form.wpcf7-form .your-email input").val();
        var message = jQuery("#course form.wpcf7-form .your-message textarea").val();
        if (!isNullEmptyOrUndefined(name) && !isNullEmptyOrUndefined(email) && !isNullEmptyOrUndefined(message)) {
            allInputsValid = true;
        };
        if (allInputsValid) {
            $scope.sendingMail = true;
            $scope.mailSuccess = false;
            $scope.mailFail = false;
            message = message.
            concat("<br><br>").
            concat("<b>Meddelandet skickades av: </b>").
            concat("<br>").
            concat(name).
            concat("<br>").
            concat(email).
            concat("<br>").
            concat("via leadershipdiamond.com.").
            replace(/(?:\r\n|\r|\n)/g, '<br />');

            startSvc.sendMail("", message).then(function (response) {
                console.log("Mail was sent! Response: \n");
                $scope.sendingMail = false;
                $scope.mailSuccess = true;
                $scope.mailFail = false;
            }).catch(function () {
                console.log("Error in send mail. Response: \n");
                $scope.sendingMail = false;
                $scope.mailSuccess = false;
                $scope.mailFail = true;

            });
        } else {
            $scope.showInputError = true;
        };


    };

    //On Document ready
    jQuery(document).ready(function () {

        jQuery("#sidr-main .sidr-inner ul li a").each(function (elem) {
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
        //Send mail on form submit
        jQuery("#course .contact-form-placeholder form.wpcf7-form").on("submit", function (event) {
            $scope.confAndSendMail();
        });
    });

    $scope.getTranslationByTitle = function (title) {
        var translation = $scope.allTranslations.filter(function (item) {
            return item.title === title;
        });
        return translation[0];
    };


    $scope.trimPostContent = function (content) {
        return content.replace(/<\/?[^>]+(>|$)/g, "").replace(/(\r\n|\n|\r)/gm, " ").replace("&#038;", "\u0026").trim();
    };

    $scope.getFooterSubGroupName = function (groupId) {
        groupName = "";
        switch (groupId) {
        case "1":
            groupName = $scope.sweden.content;
            break;
        case "2":
            groupName = $scope.india.content;
            break;
        case "3":
            groupName = $scope.usa.content;
            break;
        case "4":
            groupName = "none";
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
                content: post.content,
                title: post.title
            }
            transObject.content = $scope.trimPostContent(transObject.content).replace(/NEWPARA/g, "\n\n");
            if ('wpcf-extra-content' in post.custom_fields) {
                transObject["extraContent"] = post.custom_fields['wpcf-extra-content'][0];
            };
            transObject.content = transObject.content.replace(/&#8211;/g, '--')
            $scope.allTranslations.push(transObject);
        });
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
                if ('wpcf-index' in entry.custom_fields) {
                    entry["index"] = entry.custom_fields['wpcf-index'][0];
                };
                entry.title = entry.title.replace("&#038;", "\u0026");
            });
            $scope.isLoaded.footer = true;
        }).catch(function () {
            console.log("Error in get footer content");
            $scope.isLoaded.footer = true;
        });
    };

    $scope.setLatestClickedPostId = function (postId) {
        //Don't show the go back to latest question button in ie - because that browser only understands about 50% of the code u write 
        if (document.documentMode === undefined) {
            $scope.aQuestionWasClicked = true;
            $scope.latestClickedPostId = postId;
        }
        $scope.aQuestionWasClicked = true;
        $scope.latestClickedPostId = postId;

    };

    $scope.getAllTranslations();
    $scope.getAllCourses();
    $scope.goToElement = function (eID) {
        $location.hash(eID);
        scrollSvc.scrollTo(eID);
    };
}]);