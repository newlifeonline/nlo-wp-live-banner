#/usr/bin/bash
BUILD_OUT_FOLDER="were-live"
cp -r ./src ./$BUILD_OUT_FOLDER
zip -r $BUILD_OUT_FOLDER-build ./$BUILD_OUT_FOLDER
rm -r $BUILD_OUT_FOLDER