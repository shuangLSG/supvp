
        // =====================================  个人消息

        // 更新个人头像
        var $input = $('#uploadfile');
        var URL = window.URL || window.webkitURL;
        if (URL) {
            // 给input添加监听
            $input.change(function () {

                var file = document.getElementById('uploadfile').files[0];
                let fd = new FormData();
                fd.append(file.name, file);
                var avatarConfig = {
                    avatar: {
                        formData: fd
                    }
                }
                updateSelfInfo(avatarConfig)
            })
        }
        async function updateSelfInfo(self) {
            var data = await apiService.updateSelfInfo(self.info);
            if (data.code) {
                mui.toast(data);
                if (self.avatar) {
                    updateSelfAvatar(self);
                }
            } else {
                if (self.avatar) {
                    updateSelfAvatar(self);
                }
            }
        }
        async function updateSelfAvatar(self) {
            const avatarObj = {
                avatar: self.avatar.formData
            };
            const data = await apiService.updateSelfAvatar(avatarObj);
            if (!data.code) {
                setSelfAvatar(self);
            }
        }

        async function setSelfAvatar(self) {
            const userObj = {
                username: global.username
            };
            var data = await apiService.getUserInfo(userObj);
            if (!data.code && data.user_info.avatar !== '') {
                const urlObj = {
                    media_id: data.user_info.avatar
                };
                var urlInfo = await apiService.getResource(urlObj);
                if (!urlInfo.code) {
                    global.avatarUrl = urlInfo.url;
                }
            }
        }